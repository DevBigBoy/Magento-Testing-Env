<?php

namespace Shezo\GiftCard\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class GiftCard extends AbstractDb
{
    protected function _construct(){
        $this->_init(
            'shezo_gift_card',
            'id'
        );
    }
}
