<?php

namespace Mediaopt\DHL\Api;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Mediaopt\DHL\Adapter\WarenpostShipmentOrderRequestBuilder;
use Mediaopt\DHL\Api\Warenpost\WarenpostResponse;
use Mediaopt\DHL\Exception\WebserviceException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\ViewConfig;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\EshopCommunity\Core\Exception\FileException;
use Psr\Log\LoggerInterface;
use Mediaopt\DHL\Model\MoDHLLabel;
use stdClass;

class Warenpost extends Base
{
    /**
     * @var string
     */
    const PARTNER_ID = 'DP_LT';

    /**
     * @var string
     */
    const KEY_PHASE = '1';

    /**
     * @var string
     */
    protected $authorizationKey;

    /**
     * @var string
     */
    protected $authorizationName;

    /**
     * @var string
     */
    protected $oAuthToken;

    /**
     * @var WarenpostShipmentOrderRequestBuilder|null
     */
    protected $warenpostShipmentOrderRequestBuilder;

    /**
     * @param Credentials     $credentials
     * @param LoggerInterface $logger
     * @param ClientInterface $client
     */
    public function __construct(Credentials $credentials, LoggerInterface $logger, ClientInterface $client)
    {
        parent::__construct($credentials, $logger, $client);
        $this->warenpostShipmentOrderRequestBuilder = new WarenpostShipmentOrderRequestBuilder();
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return '';
    }

    /**
     * @param Order $order
     * @return WarenpostResponse
     */
    public function createWarenpost(Order $order): WarenpostResponse
    {
        $shipmentOrderRequest = $this->createShipmentOrderRequest($this->warenpostShipmentOrderRequestBuilder->build($order));

        $remoteShipmentOrderId = $this->createRemoteShipmentOrder($shipmentOrderRequest);
        return new WarenpostResponse(
            $remoteShipmentOrderId,
            $this->getLabel($remoteShipmentOrderId)
        );
    }


    /**
     * @param Order           $order
     * @param WarenpostResponse $response
     * @throws Exception
     */
    public function handleResponse(Order $order, WarenpostResponse $response)
    {
        $label = MoDHLLabel::fromOrderAndWarenpost($order, $response);
        $label->save();
    }

    /**
     * @return string
     */
    protected function getOAuthToken(): string
    {
        if (!empty($this->oAuthToken)) {
            return $this->oAuthToken;
        }

        $credentials = $this->getCredentials();
        $this->authorizationKey = base64_encode($credentials->getUsername() . ':' . $credentials->getPassword());
        $this->authorizationName = 'Basic';
        $authString = $this->callApi('v1/auth/accesstoken');

        preg_match('/<userToken>(.*?)<\/userToken>/s', $authString, $matches);

        $this->oAuthToken = $matches[1];
        return $this->oAuthToken;
    }

    /**
     * @param WarenpostShipmentOrderRequestBuilder $warenpostBuilder
     * @return array
     */
    protected function createShipmentOrderRequest(WarenpostShipmentOrderRequestBuilder $warenpostBuilder): array
    {
        $this->authorizationKey = $this->getOAuthToken();
        $this->authorizationName = 'Bearer';

        $warenpostBuilderOrder = $warenpostBuilder->getOrder();
        $credentials = $this->credentials;
        $warenpostBuilderOrder['customerEkp'] = $credentials->getEkp();

        return $warenpostBuilderOrder;
    }

    /**
     * @param array $warenpostBuilderOrder
     * @return string
     */
    protected function createRemoteShipmentOrder(array $warenpostBuilderOrder): string
    {
        $warenpostResponse = $this->callApi(
            'dpi/shipping/v1/orders',
            ['body' => json_encode($warenpostBuilderOrder)],
            'post'
        );

        $responseObject = json_decode($warenpostResponse);

        return $responseObject->shipments[0]->awb;
    }

    protected function getLabel($remoteShipmentOrderId)
    {
        $this->authorizationKey = $this->getOAuthToken();
        $this->authorizationName = 'Bearer';
        $buildRequestOptions = $this->buildRequestOptions();

        $headers = [];
        foreach ($buildRequestOptions['headers'] as $key => $header) {
            $headers[] = "$key: $header";
        }

        $url = $this->buildUrl("dpi/shipping/v1/shipments/$remoteShipmentOrderId/itemlabels");

        return $this->curlApi($url, $headers);
    }

    /**
     * @param string $fileName
     * @param array  $data
     * @throws FileException
     */
    protected function storeData($fileName, $data)
    {
        $path = Registry::get(ViewConfig::class)->getModulePath('mo_dhl', 'documents');
        file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, base64_decode($data));
    }

    protected function buildRequestOptions()
    {
        $requestTimestamp = date('dmY-His');
        $partnerSignature = $this->buildPartnerSignature($requestTimestamp);

        return [
            'headers' => [
                'KEY_PHASE' => self::KEY_PHASE,
                'PARTNER_ID' => self::PARTNER_ID,
                'REQUEST_TIMESTAMP' => $requestTimestamp,
                'PARTNER_SIGNATURE' => $partnerSignature,
                'Authorization' => "$this->authorizationName $this->authorizationKey",
            ]
        ];
    }

    /**
     * @param $requestTimestamp
     * @return string
     */
    protected function buildPartnerSignature($requestTimestamp): string
    {
        $string = implode('::', [self::PARTNER_ID, $requestTimestamp, self::KEY_PHASE, $this->authorizationKey]);
        $md5 = md5($string);
        return substr($md5, 0, 8);
    }

    /**
     * @param string $relativeUrl
     * @param array $options
     * @param string $method
     *
     * @return stdClass
     * @throws WebserviceException
     */
    protected function callApi($relativeUrl, $options = [], $method = 'get')
    {
        if ($options === [] && array_key_exists($relativeUrl, $this->memoizations)) {
            return $this->memoizations[$relativeUrl];
        }

        $url = $this->buildUrl($relativeUrl);
        $requestOptions = array_merge($options, $this->buildRequestOptions());
        $this->getLogger()->debug(__METHOD__ . " - API call with $url", ['options' => $requestOptions]);

        try {
            $response = $this->getClient()->{$method}($url, $requestOptions);
            $body = $response->getBody();
            $payload = $body !== null ? $body->getContents() : '';
            if ($payload === '') {
                $message = __METHOD__ . " - The API call to $url returned an empty body";
                $this->getLogger()->error($message, ['response' => $response]);
                throw new WebserviceException('API returned an empty body.');
            }

            return $payload;
        } catch (RequestException $exception) {
            $message = __METHOD__ . " - The API call to $url failed due to {$exception->getMessage()}";

            $this->getLogger()->error($message, ['exception' => $exception]);
            throw new WebserviceException('Failed API call.', 0, $exception);
        }
    }


    /**
     * @param string $url
     * @param array $headers
     * @return bool|string
     */
    protected function curlApi(string $url, array $headers)
    {
        $this->getLogger()->debug(__METHOD__ . " - API call with $url", ['options' => $headers]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers,
        ]);
        $payload = curl_exec($curl);
        curl_close($curl);

        if ($payload === '') {
            $message = __METHOD__ . " - The API call to $url returned an empty body";
            $this->getLogger()->error($message);
            throw new WebserviceException('API returned an empty body.');
        }

        return $payload;
    }

    /**
     * @param string $relativeUrl
     * @return string
     */
    protected function buildUrl($relativeUrl): string
    {
        return "{$this->getCredentials()->getEndpoint()}/$relativeUrl";
    }
}