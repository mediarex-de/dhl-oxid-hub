<?php
/**
 * For the full copyright and license information, refer to the accompanying LICENSE file.
 *
 * @copyright 2017 Mediaopt GmbH
 */

namespace Mediaopt\DHL\Api;

use GuzzleHttp\ClientInterface;
use Mediaopt\DHL\Address\Address;
use Mediaopt\DHL\Api\Standortsuche\ServiceProviderBuilder;
use Mediaopt\DHL\Exception\ServiceProviderException;
use Mediaopt\DHL\Exception\WebserviceException;
use Mediaopt\DHL\ServiceProvider\BasicServiceProvider;
use Mediaopt\DHL\ServiceProvider\Coordinates;
use Mediaopt\DHL\ServiceProvider\ServiceProviderList;
use Mediaopt\DHL\ServiceProvider\ServiceType;
use Psr\Log\LoggerInterface;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\EshopCommunity\Core\Registry;

/**
 * Class that calls the Standortsuche Europa API.
 *
 * @author  Mediaopt GmbH
 * @version ${VERSION}, ${REVISION}
 * @package Mediaopt\DHL
 */
class Standortsuche extends Base
{
    /**
     * Maximum distance (in meters) of service providers in Germany that are allowed to be returned.
     */
    const MAXIMUM_DISTANCE_GERMANY = 15000;

    /**
     * @var ServiceProviderBuilder
     */
    protected $serviceProviderBuilder;

    /**
     * @param Credentials            $credentials
     * @param LoggerInterface        $logger
     * @param ClientInterface        $client
     * @param ServiceProviderBuilder $serviceProviderBuilder
     */
    public function __construct(
        Credentials $credentials,
        LoggerInterface $logger,
        ClientInterface $client,
        ServiceProviderBuilder $serviceProviderBuilder = null
    ) {
        parent::__construct($credentials, $logger, $client);
        $this->serviceProviderBuilder = $serviceProviderBuilder ?: new ServiceProviderBuilder();
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return 'parcelshopfinderrest';
    }

    /**
     * @param ServiceType $serviceType
     * @param Coordinates $coordinates
     * @return ServiceProviderList
     * @throws WebserviceException
     */
    public function getParcellocationByServiceTypeAndCoordinate(ServiceType $serviceType, Coordinates $coordinates)
    {
        $parameters = $serviceType->getName() . '/' . $coordinates->getLatitude() . '/' . $coordinates->getLongitude();
        return $this->extractServiceProviders($this->callApi('parcellocationByCoordinate/' . $parameters));
    }

    /**
     * @param \stdClass $object
     * @return ServiceProviderList
     */
    protected function extractServiceProviders(\stdClass $object)
    {
        $serviceProviders = array_map([$this, 'buildServiceProvider'], $object->psfParcellocationList);
        return new ServiceProviderList(array_filter($serviceProviders, [$this, 'isServiceProviderAllowed']));
    }

    /**
     * @param \stdClass $rawServiceProvider
     * @return BasicServiceProvider|null
     */
    protected function buildServiceProvider(\stdClass $rawServiceProvider)
    {
        try {
            return $this->getServiceProviderBuilder()->build($rawServiceProvider);
        } catch (ServiceProviderException $exception) {
            $message = "Service provider could not be processed due exception: {$exception->getMessage()}";
            $this->getLogger()->error($message, ['exception' => $exception]);
            return null;
        }
    }

    /**
     * @return ServiceProviderBuilder
     */
    protected function getServiceProviderBuilder()
    {
        return $this->serviceProviderBuilder;
    }

    /**
     * @param Coordinates $coordinates
     * @return ServiceProviderList
     * @throws WebserviceException
     */
    public function getParcellocationByCoordinate(Coordinates $coordinates)
    {
        $parameters = $coordinates->getLatitude() . '/' . $coordinates->getLongitude();
        return $this->extractServiceProviders($this->callApi('parcellocationByCoordinate/' . $parameters));
    }

    /**
     * @param ServiceType    $serviceType
     * @param Address|string $address
     * @return ServiceProviderList
     * @throws WebserviceException
     */
    public function getParcellocationByAddressAndServiceType(ServiceType $serviceType, $address)
    {
        $addressString = $this->buildAddressString($address);
        if ($addressString === '') {
            return new ServiceProviderList([]);
        }
        $locations = $this->callApi('find-by-address?' . $addressString);
        $oldAPIstandart = $this->convert($locations);
        return $this->extractServiceProviders($oldAPIstandart);
    }

    /**
     * Generates a string with basic sanitization from the supplied address.
     *
     * @param Address|string $address
     * @return string
     */
    protected function buildAddressString($address)
    {
        [$postalCode, $addressLocality] = explode(' ', (string)Registry::get(Request::class)->getRequestParameter('locality'));

        $urlOptions = [
            "countryCode=DE",
            "addressLocality=$addressLocality",
            "postalCode=$postalCode",
            "streetAddress=" . (string)Registry::get(Request::class)->getRequestParameter('street'),
            'limit=50'
        ];

        return $this->sanitizeAddressString(implode('&', $urlOptions));
    }

    /**
     * @param Address|string $address
     * @return ServiceProviderList
     * @throws WebserviceException
     */
    public function getParcellocationByAddress($address)
    {
        $addressString = $this->buildAddressString($address);
        if ($addressString === '') {
            return new ServiceProviderList([]);
        }

        return $this->extractServiceProviders($this->callApi('parcellocationByAddress/' . $addressString));
    }

    /**
     * @param string $key
     * @return BasicServiceProvider
     * @throws WebserviceException
     */
    public function getParcellocationByPrimaryKeyPSF($key)
    {
        $serviceProvider = $this->buildServiceProvider($this->callApi('parcellocationByPrimaryKeyPSF/' . $key));
        if ($serviceProvider !== null) {
            return $serviceProvider;
        }
        throw new WebserviceException('NO_RESULT');
    }

    /**
     * @param BasicServiceProvider|null $potentialServiceProvider
     * @return bool
     */
    protected function isServiceProviderAllowed($potentialServiceProvider)
    {
        if ($potentialServiceProvider === null || $potentialServiceProvider->getAddress()->getCountry() !== 'de') {
            return false;
        }

        return $potentialServiceProvider->getLocation()->getDistance() <= self::MAXIMUM_DISTANCE_GERMANY;
    }

    /**
     * @param string $address
     * @return string
     */
    protected function sanitizeAddressString($address)
    {
        $forbiddenCharacters = ['/', '\\'];
        return trim(str_replace($forbiddenCharacters, '-', $address));
    }

    protected function buildRequestOptions(){
        return ['headers' => ['DHL-API-Key' => 'kAPjq3yHFgY6QD3sHEtv61dQCAgoXLyK']];
    }

    protected function buildUrl($url)
    {
        return 'https://api.dhl.com/location-finder/v1/' . $url;
    }

    private function convert($items)
    {
        $newItems = [];
        foreach ($items->locations as $item) {

            $locationId = $item->location->ids[0]->locationId;
            [$systemID, $primaryKeyDeliverySystem] = explode('-', $locationId);

            $newItems[] = (object)[
                'countryCode' => strtolower($item->place->address->countryCode),
                'zipCode' => $item->place->address->postalCode,
                'city' => $item->place->address->addressLocality,
                'district' => '',
                'additionalInfo' => '',
                'area' => '',
                'street' => $item->place->address->streetAddress,
                'houseNo' => '',
                'additionalStreet' => '',
                'format1' => '',
                'format2' => '',
                'routingCode' => '',
                'keyWord' => $item->location->keyword,
                'partnerType' => '',
                'shopType' => $this->buildshopType($item->location->type),
                'shopName' => $item->name,
                'primaryLanguage' => '',
                'secondaryLanguage' => '',
                'tertiaryLanguage' => '',
                'geoPosition' => (object)[
                    'latitude' => $item->place->geo->latitude,
                    'longitude' => $item->place->geo->longitude,
                    'distance' => $item->distance
                ],
                'primaryKeyDeliverySystem' => $primaryKeyDeliverySystem,
                'primaryKeyZipRegion' => $item->location->keywordId,
                'systemID' => $systemID,
                'primaryKeyPSF' => $item->location->ids[0]->locationId,
                'psfFiles' => [],
                'psfServicetypes' => $this->buildPsfServicetypes($item->serviceTypes),
                'psfClosureperiods' => [],
                'psfWelcometexts' => [],
                'psfOtherinfos' => $this->convertOpeningHours($item->openingHours)
            ];
        }

        return (object)['psfParcellocationList' => $newItems];
    }

    private function buildPsfServicetypes($array)
    {
        $return = [];
        foreach ($array as $item) {
            switch ($item) {
                case 'parcel:pickup':
                case 'parcel:pick-up-registered':
                    $return[] = 'parcelpickup';
                    break;
                case 'postident':
                    $return[] = 'postident';
                    break;
                case 'handicapped-access':
                    $return[] = 'handicappedAccess';
                    break;
                case 'cash-on-delivery':
                    $return[] = 'COD';
                    break;
                case 'parcel:drop-off':
                case 'parcel:drop-off-unregistered':
                    $return[] = 'parcelacceptance';
                    break;
                case 'parking':
                    $return[] = 'parking';
                    break;
                case 'age-verification':
                    $return[] = 'ageVerification';
                    break;
                default:
                    break;
            }
        }
        return $return;
    }

    private function buildshopType($type)
    {
        switch ($type) {
            case 'postoffice':
                return 'postOffice';
            case 'servicepoint':
                return 'parcelShop';
            case 'locker':
                return 'packStation';
            default:
                return '';
        }
    }

    private function convertOpeningHours($array) {
        $monday = 'dash';
        $saturday = 'dash';
        $sunday = 'dash';
        foreach ($array as $day) {
            $workingTiime = substr($day->opens, 0, '-3') . ' - ' . substr($day->closes, 0, '-3');
            switch ($day->dayOfWeek) {
                case 'http://schema.org/Monday' :
                    $monday = $workingTiime;
                    break;
                case 'http://schema.org/Saturday' :
                    $saturday = $workingTiime;
                    break;
                case 'http://schema.org/Sunday' :
                    $sunday = $workingTiime;
                    break;
                default:
                    break;
            }
        }
        return [
            (object)['type' => 'tt_openinghour_00', 'content' => 'mo-fr'],
            (object)['type' => 'tt_openinghour_01', 'content' => $monday],
            (object)['type' => 'tt_openinghour_10', 'content' => 'sa'],
            (object)['type' => 'tt_openinghour_11', 'content' => $saturday],
            (object)['type' => 'tt_openinghour_20', 'content' => 'su'],
            (object)['type' => 'tt_openinghour_21', 'content' => $sunday]
        ];
    }
}
