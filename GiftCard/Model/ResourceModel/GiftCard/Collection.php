<?php

namespace Shezo\GiftCard\Model\ResourceModel\GiftCard;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Shezo\GiftCard\Model\GiftCard;
use Shezo\GiftCard\Model\ResourceModel\GiftCard as GiftCardResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct(){
        $this->_init(
            GiftCard::class,
            GiftCardResourceModel::class
        );
    }
}
