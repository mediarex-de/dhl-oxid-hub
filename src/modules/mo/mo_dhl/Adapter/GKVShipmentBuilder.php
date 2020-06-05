<?php

namespace Mediaopt\DHL\Adapter;

use Mediaopt\DHL\Api\GKV\CommunicationType;
use Mediaopt\DHL\Api\GKV\CountryType;
use Mediaopt\DHL\Api\GKV\NameType;
use Mediaopt\DHL\Api\GKV\NativeAddressType;
use Mediaopt\DHL\Api\GKV\PackStationType;
use Mediaopt\DHL\Api\GKV\PostfilialeType;
use Mediaopt\DHL\Api\GKV\ReceiverNativeAddressType;
use Mediaopt\DHL\Api\GKV\ReceiverType;
use Mediaopt\DHL\Api\GKV\Serviceconfiguration;
use Mediaopt\DHL\Api\GKV\ServiceconfigurationDetails;
use Mediaopt\DHL\Api\GKV\ServiceconfigurationDetailsOptional;
use Mediaopt\DHL\Api\GKV\Shipment;
use Mediaopt\DHL\Api\GKV\ShipmentDetailsType;
use Mediaopt\DHL\Api\GKV\ShipmentItemType;
use Mediaopt\DHL\Api\GKV\ShipmentNotificationType;
use Mediaopt\DHL\Api\GKV\ShipmentService;
use Mediaopt\DHL\Api\GKV\ShipperType;
use Mediaopt\DHL\Application\Model\Order;
use Mediaopt\DHL\Model\MoDHLNotificationMode;
use Mediaopt\DHL\ServiceProvider\Branch;
use Mediaopt\DHL\Shipment\BillingNumber;
use OxidEsales\Eshop\Core\Registry;

/**
 * For the full copyright and license information, refer to the accompanying LICENSE file.
 *
 * @copyright 2019 Mediaopt GmbH
 */

/**
 * This class transforms an Order object into a Shipment object.
 *
 * @author Mediaopt GmbH
 */
class GKVShipmentBuilder extends BaseShipmentBuilder
{

    /**
     * @param Order $order
     * @return Shipment
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     */
    public function build(Order $order)
    {
        $shipment = new Shipment($this->buildShipmentDetails($order), $this->buildShipper(), $this->buildReceiver($order));
        $shipment->setReturnReceiver($this->buildReturnReceiver());
        return $shipment;
    }

    /**
     * @param Order $order
     * @return ShipmentDetailsType
     */
    protected function buildShipmentDetails(Order $order): ShipmentDetailsType
    {
        $details = new ShipmentDetailsType($this->getProcess($order)->getServiceIdentifier(), $this->buildAccountNumber($order), $this->buildShipmentDate(), $this->buildShipmentItem($order));
        if (Registry::getConfig()->getShopConfVar('mo_dhl__beilegerretoure_active') && $this->getProcess($order)->supportsDHLRetoure() && $returnBookingNumber = $this->buildReturnAccountNumber($order)) {
            $details->setReturnShipmentAccountNumber($returnBookingNumber);
        }
        if ($this->sendNotificationAllowed($order)) {
            $details->setNotification(new ShipmentNotificationType($order->getFieldData('oxbillemail')));
        }
        $details->setService($this->buildService($order));
        return $details;
    }

    /**
     * @param Order $order
     * @return ReceiverType
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    protected function buildReceiver($order): ReceiverType
    {
        $receiver = new ReceiverType($order->moDHLGetAddressData('fname') . ' ' . $order->moDHLGetAddressData('lname'));
        if (Branch::isPackstation($order->moDHLGetAddressData('street'))) {
            $receiver->setPackstation($this->buildPackstation($order));
        } else if (Branch::isFiliale($order->moDHLGetAddressData('street'))) {
            $receiver->setPostfiliale($this->buildPostfiliale($order));
        } else {
            $receiver->setAddress($this->buildAddress($order));
            $receiver->setCommunication($this->buildCommunication($order));
        }
        return $receiver;
    }

    /**
     * @param Order $order
     * @return CommunicationType
     */
    protected function buildCommunication($order)
    {
        return (new CommunicationType())
            ->setContactPerson($order->moDHLGetAddressData('fname') . ' ' . $order->moDHLGetAddressData('lname'))
            ->setEmail($order->getFieldData('oxbillemail'))
            ->setPhone($order->moDHLGetAddressData('fon'));
    }

    /**
     * @param string $countryId
     * @return CountryType
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    protected function buildCountry($countryId)
    {
        $country = \oxNew(\OxidEsales\Eshop\Application\Model\Country::class);
        $country->load($countryId);
        return new CountryType($country->getFieldData('oxisoalpha2'));
    }

    /**
     * @param Order $order
     * @return BillingNumber
     */
    protected function buildAccountNumber(Order $order): BillingNumber
    {
        return new BillingNumber($this->getEkp($order), $this->getProcess($order), $this->getParticipation($order));
    }

    /**
     * @param Order $order
     * @return BillingNumber|null
     */
    public function buildReturnAccountNumber(Order $order)
    {
        if (!$this->getReturnProcess($order)) {
            return null;
        }
        return new BillingNumber($this->getEkp($order), $this->getReturnProcess($order), $this->getParticipation($order));
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function buildShipmentDate(): string
    {
        $wunschpaket = Registry::get(\Mediaopt\DHL\Wunschpaket::class);
        return $wunschpaket->getWunschpaket()->getTransferDay()->format('Y-m-d');
    }

    /**
     * @param Order $order
     * @return ShipmentItemType
     */
    protected function buildShipmentItem(Order $order): ShipmentItemType
    {
        return new ShipmentItemType($this->calculateWeight($order));
    }

    /**
     * @param Order $order
     * @return ShipmentService
     */
    private function buildService(Order $order): ShipmentService
    {
        $service = new ShipmentService();
        $process = $this->getProcess($order);
        $remark = $order->oxorder__oxremark->value;
        $wunschpaket = Registry::get(\Mediaopt\DHL\Wunschpaket::class);
        if ($wunschpaket->hasWunschtag($remark) && $process->supportsPreferredDay()) {
            $wunschtag = $wunschpaket->extractWunschtag($remark);
            $wunschtag = substr($wunschtag, 6) . '-' . substr($wunschtag, 3,2) . '-' . substr($wunschtag, 0, 2);
            $service->setPreferredDay(new ServiceconfigurationDetails(1, $wunschtag));
        }
        [$type, $locationPart1, $locationPart2] = $wunschpaket->extractLocation($remark);
        if ($wunschpaket->hasWunschnachbar($remark) && $process->supportsPreferredNeighbour()) {
            $service->setPreferredNeighbour(new ServiceconfigurationDetails(1, "$locationPart2, $locationPart1"));
        }
        if ($wunschpaket->hasWunschort($remark) && $process->supportsPreferredLocation()) {
            $service->setPreferredLocation(new ServiceconfigurationDetails(1, $locationPart1));
        }
        if ($process->supportsGoGreen()) {
            $isActive = (bool)Registry::getConfig()->getShopConfVar('mo_dhl__go_green_active');
            $service->setGoGreen(new Serviceconfiguration($isActive));
        }
        if ($process->supportsParcelOutletRouting()) {
            $isActive = (bool)Registry::getConfig()->getShopConfVar('mo_dhl__filialrouting_active');
            $altEmail = Registry::getConfig()->getShopConfVar('mo_dhl__filialrouting_alternative_email') ?: null;
            $service->setParcelOutletRouting(new ServiceconfigurationDetailsOptional($isActive, $altEmail));
        }
        return $service;
    }

    /**
     * @return ShipperType
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     */
    protected function buildReturnReceiver(): ShipperType
    {
        $config = Registry::getConfig();
        if ($config->getShopConfVar('mo_dhl__retoure_receiver_use_sender')) {
            return $this->buildShipper();
        }
        $name = new NameType($config->getShopConfVar('mo_dhl__retoure_receiver_line1'), $config->getShopConfVar('mo_dhl__retoure_receiver_line2'), $config->getShopConfVar('mo_dhl__retoure_receiver_line3'));
        $iso2 = \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->getOne('SELECT OXISOALPHA2 from oxcountry where OXISOALPHA3 = ? ', [$config->getShopConfVar('mo_dhl__retoure_receiver_country')]);
        $country = new CountryType($iso2);
        $address = new NativeAddressType($config->getShopConfVar('mo_dhl__retoure_receiver_street'), $config->getShopConfVar('mo_dhl__retoure_receiver_street_number'), $config->getShopConfVar('mo_dhl__retoure_receiver_zip'), $config->getShopConfVar('mo_dhl__retoure_receiver_city'), null, $country);
        return new ShipperType($name, $address);
    }

    /**
     * @return ShipperType
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     */
    protected function buildShipper(): ShipperType
    {
        $config = Registry::getConfig();

        $name = new NameType($config->getShopConfVar('mo_dhl__sender_line1'), $config->getShopConfVar('mo_dhl__sender_line2'), $config->getShopConfVar('mo_dhl__sender_line3'));
        $iso2 = \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->getOne('SELECT OXISOALPHA2 from oxcountry where OXISOALPHA3 = ? ', [$config->getShopConfVar('mo_dhl__sender_country')]);
        $country = new CountryType($iso2);
        $address = new NativeAddressType($config->getShopConfVar('mo_dhl__sender_street'), $config->getShopConfVar('mo_dhl__sender_street_number'), $config->getShopConfVar('mo_dhl__sender_zip'), $config->getShopConfVar('mo_dhl__sender_city'), null, $country);
        return new ShipperType($name, $address);
    }

    /**
     * @param Order $order
     * @return PostfilialeType
     */
    private function buildPostfiliale(Order $order): PostfilialeType
    {
        return new PostfilialeType($order->moDHLGetAddressData('streetnr'), $order->moDHLGetAddressData('addinfo'), $order->moDHLGetAddressData('zip'), $order->moDHLGetAddressData('city'));
    }

    /**
     * @param Order $order
     * @return PackStationType
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    protected function buildPackstation(Order $order): PackStationType
    {
        return new PackStationType($order->moDHLGetAddressData('addinfo'), $order->moDHLGetAddressData('streetnr'), $order->moDHLGetAddressData('zip'), $order->moDHLGetAddressData('city'), null, $this->buildCountry($order->moDHLGetAddressData('countryid')));
    }

    /**
     * @param Order $order
     * @return ReceiverNativeAddressType
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    protected function buildAddress(Order $order): ReceiverNativeAddressType
    {
        $address = new ReceiverNativeAddressType(
            $order->moDHLGetAddressData('company') ?: null,
            $order->moDHLGetAddressData('addinfo') ?: null,
            $order->moDHLGetAddressData('street'),
            $order->moDHLGetAddressData('streetnr'),
            $order->moDHLGetAddressData('zip'),
            $order->moDHLGetAddressData('city'),
            null,
            $this->buildCountry($order->moDHLGetAddressData('countryid'))
        );
        return $address;
    }

    /**
     * @param Order $order
     * @return bool
     */
    protected function sendNotificationAllowed(Order $order): bool
    {
        if (!$this->getProcess($order)->supportsNotification()) {
            return false;
        }
        switch (Registry::getConfig()->getShopConfVar('mo_dhl__notification_mode')) {
            case MoDHLNotificationMode::NEVER:
                return false;
            case MoDHLNotificationMode::ALWAYS:
                return true;
            default:
                return (bool)$order->getFieldData('MO_DHL_ALLOW_NOTIFICATION');
        }
    }
}
