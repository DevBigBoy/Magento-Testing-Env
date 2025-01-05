<?php

namespace Shezo\AnimalLovers\Model;

use Magento\Framework\Model\AbstractModel;
use Shezo\AnimalLovers\Api\Data\CustomerPetPreferenceInterface;

class CustomerPetPreference extends AbstractModel implements CustomerPetPreferenceInterface
{
    protected function _construct()
    {
        $this->_init(\Shezo\AnimalLovers\Model\ResourceModel\CustomerPetPreference::class);
    }

    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    public function getIsDogLover()
    {
        return (bool)$this->getData(self::IS_DOG_LOVER);
    }

    public function setIsDogLover($isDogLover)
    {
        return $this->setData(self::IS_DOG_LOVER, $isDogLover);
    }

    public function getIsCatLover()
    {
        return (bool)$this->getData(self::IS_CAT_LOVER);
    }

    public function setIsCatLover($isCatLover)
    {
        return $this->setData(self::IS_CAT_LOVER, $isCatLover);
    }
}
