<?php
/**
 * For the full copyright and license information, refer to the accompanying LICENSE file.
 *
 * @copyright 2020 Mediaopt GmbH
 */

namespace Mediaopt\DHL\Model;


use Mediaopt\DHL\Api\Internetmarke\RetoureVouchersResponseType;
use Mediaopt\DHL\Api\ProdWS\AccountProdReferenceType;
use Mediaopt\DHL\Api\ProdWS\AdditionalProductType;
use Mediaopt\DHL\Api\ProdWS\BasicProductType;
use Mediaopt\DHL\Api\ProdWS\SalesProductType;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Registry;

/**
 * @author Mediaopt GmbH
 */
class MoDHLInternetmarkeRefund extends BaseModel
{

    /**
     * @var string
     */
    protected $_sCoreTable = 'mo_dhl_internetmarke_refunds';

    /**
     * @var string
     */
    protected $_sClassName = self::class;

    /**
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    public static function fromRetoureVouchersResponse(RetoureVouchersResponseType $response)
    {
        $refund = new self();
        $refund->assign([
            'oxshopid' => Registry::getConfig()->getShopId(),
            'oxid' => $response->getRetoureTransactionId(),
            'status' => 'Requested',
        ]);
        return $refund;
    }
}
