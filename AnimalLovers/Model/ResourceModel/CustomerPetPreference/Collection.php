<?php

namespace Shezo\AnimalLovers\Model\ResourceModel\CustomerPetPreference;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Shezo\AnimalLovers\Model\CustomerPetPreference as Model;
use Shezo\AnimalLovers\Model\ResourceModel\CustomerPetPreference as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
