<?php

namespace Shezo\CancelOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CancelOrderRequest extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('shezo_customer_cancel_order_comment', 'id'); // Table name and primary key
    }
}
