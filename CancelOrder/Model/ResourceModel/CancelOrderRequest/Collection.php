<?php

namespace Shezo\CancelOrder\Model\ResourceModel\CancelOrderRequest;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Shezo\CancelOrder\Model\CancelOrderRequest as Model;
use Shezo\CancelOrder\Model\ResourceModel\CancelOrderRequest as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
