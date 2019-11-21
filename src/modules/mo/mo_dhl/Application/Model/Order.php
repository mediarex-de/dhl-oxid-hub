<?php

namespace Mediaopt\DHL\Application\Model;

/**
 * For the full copyright and license information, refer to the accompanying LICENSE file.
 *
 * @copyright 2016 Mediaopt GmbH
 */

use Mediaopt\DHL\ServiceProvider\Branch;

/** @noinspection LongInheritanceChainInspection */

/**
 * Adds functionality to...
 * - ... exclude delivery sets in case the destination is a Packstation or Postfiliale.
 * - ... exclude payment options in case the destination is a Packstation or Postfiliale.
 * - ... add surcharges in case Wunschtag or Wunschzeit is selected.
 *
 * @author Mediaopt GmbH
 */
class Order extends Order_parent
{
    /**
     * @extend
     * @param \OxidEsales\Eshop\Application\Model\Basket $basket
     * @return int|string
     */
    public function validatePayment($basket)
    {
        return $this->moDHLIsPaymentExcluded() ? \OxidEsales\Eshop\Core\Registry::getLang()->translateString('MO_DHL__PAYMENT_EXCLUDED') : parent::validatePayment($basket);
    }

    /**
     * Returns true iff the payment is excluded by configuration.
     *
     * @return bool
     * @throws \OxidEsales\Eshop\Core\Exception\ConnectionException
     */
    public function moDHLIsPaymentExcluded()
    {
        if (!$this->moDHLIsForcedToUseDhlDelivery()) {
            return false;
        }

        $db = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC);
        $paymentId = $this->oxorder__oxpaymenttype->rawValue;
        $query = "SELECT mo_dhl_excluded FROM oxpayments WHERE OXID = {$db->quote($paymentId)}";

        return (int) $db->getOne($query) > 0;
    }

    /**
     * @return bool
     */
    protected function moDHLIsForcedToUseDhlDelivery()
    {
        /** @var \Mediaopt\DHL\Application\Model\User $user */
        $user = $this->getOrderUser();
        return $this->moDHLIsDeliveredToBranch() || $user->moHasSelectedAnyWunschpaketService();
    }

    /**
     * Added call to _setUser to ensure that the delivery address is set.
     *
     * @extend
     * @param \Mediaopt\DHL\Application\Model\Basket $basket
     * @param \OxidEsales\Eshop\Application\Model\User $user
     * @return int
     */
    public function validateOrder($basket, $user)
    {
        $this->_setUser($user);
        $this->_loadFromBasket($basket);
        $this->_setPayment($basket->getPaymentId());
        return parent::validateOrder($basket, $user);
    }

    /**
     * Adds costs for Wunschtag and Wunschzeit to the delivery costs.
     *
     * @extend
     * @param \OxidEsales\Eshop\Application\Model\Basket $basket
     */
    protected function _loadFromBasket(\OxidEsales\Eshop\Application\Model\Basket $basket)
    {
        /** @var \Mediaopt\DHL\Application\Model\Basket $basket */
        parent::_loadFromBasket($basket);
        $deliveryCosts = clone $basket->getDeliveryCost();
        $deliveryCosts->add($basket->moDHLGetDeliverySurcharges()->getPrice());
        $this->oxorder__oxdelcost = new \OxidEsales\Eshop\Core\Field($deliveryCosts->getBruttoPrice(), \OxidEsales\Eshop\Core\Field::T_RAW);
    }

    /**
     * @extend
     * @param \OxidEsales\Eshop\Application\Model\Basket $basket
     * @return string|int
     * @throws \OxidEsales\Eshop\Core\Exception\ConnectionException
     */
    public function validateDelivery($basket)
    {
        return $this->moDHLIsDeliveryExcluded() ? \OxidEsales\Eshop\Core\Registry::getLang()->translateString('MO_DHL__DELIVERY_EXCLUDED') : parent::validateDelivery($basket);
    }

    /**
     * Returns true iff the delivery is excluded by configuration.
     *
     * @return bool
     * @throws \OxidEsales\Eshop\Core\Exception\ConnectionException
     */
    public function moDHLIsDeliveryExcluded()
    {
        if (!$this->moDHLIsForcedToUseDhlDelivery()) {
            return false;
        }

        $db = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC);
        $deliverySetId = $this->oxorder__oxdeltype->rawValue;
        $query = "SELECT mo_dhl_excluded FROM oxdeliveryset WHERE OXID = {$db->quote($deliverySetId)}";
        return (int) $db->getOne($query) > 0;
    }

    /**
     * @param \OxidEsales\Eshop\Application\Model\Basket $basket
     * @param \OxidEsales\Eshop\Application\Model\User $user
     * @param bool $recalculate
     * @return int
     * @throws \OxidEsales\Eshop\Core\Exception\ConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    public function finalizeOrder(\OxidEsales\Eshop\Application\Model\Basket $basket, $user, $recalculate = false)
    {
        $status = parent::finalizeOrder($basket, $user, $recalculate);
        if ((string) $this->getId() === '') {
            return $status;
        }

        $ekp = \OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam('mo_dhl__merchant_ekp');
        $process = $this->getDelSet()->oxdeliveryset__mo_dhl_process->rawValue;
        $participation = $this->getDelSet()->oxdeliveryset__mo_dhl_participation->rawValue;

        $this->oxorder__mo_dhl_ekp = \oxNew(\OxidEsales\Eshop\Core\Field::class, $ekp, \OxidEsales\Eshop\Core\Field::T_RAW);
        $this->oxorder__mo_dhl_process = \oxNew(\OxidEsales\Eshop\Core\Field::class, $process, \OxidEsales\Eshop\Core\Field::T_RAW);
        $this->oxorder__mo_dhl_participation = \oxNew(\OxidEsales\Eshop\Core\Field::class, $participation, \OxidEsales\Eshop\Core\Field::T_RAW);
        $db = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC);
        $query = ' UPDATE oxorder' . " SET MO_DHL_EKP = {$db->quote($ekp)}," . "     MO_DHL_PARTICIPATION = {$db->quote($participation)}," . "     MO_DHL_PROCESS = {$db->quote($process)}" . " WHERE OXID = {$db->quote($this->getId())}";
        $db->execute($query);

        return $status;
    }

    /**
     * @return bool
     */
    public function moDHLIsDeliveredToBranch()
    {
        return Branch::isBranch($this->oxorder__oxdelstreet->rawValue);
    }

    /**
     * @param double $amount
     * @return \OxidEsales\Eshop\Core\Price
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    public function moDHLCalculcateSurcharge($amount)
    {
        /** @var \Mediaopt\DHL\Application\Model\Basket $basket */
        $basket = $this->getBasket();
        return $basket->moDHLCalculateSurcharge($amount);
    }
}