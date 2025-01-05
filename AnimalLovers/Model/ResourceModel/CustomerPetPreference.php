<?php
declare(strict_types=1);

namespace Shezo\AnimalLovers\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomerPetPreference extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('shezo_customer_pet_preferences', 'entity_id');
    }

    public function getCustomerPreferences($customerId)
    {
        $connection = $this->getConnection();
        $select = $connection->select()
            ->from($this->getMainTable())
            ->where('customer_id = :customer_id');

        return $connection->fetchRow($select, ['customer_id' => $customerId]);
    }

    public function saveCustomerPreferences($customerId, $isDogLover, $isCatLover)
    {
        $connection = $this->getConnection();
        $data = [
            'customer_id' => $customerId,
            'is_dog_lover' => $isDogLover,
            'is_cat_lover' => $isCatLover
        ];
        $connection->insertOnDuplicate($this->getMainTable(), $data, ['is_dog_lover', 'is_cat_lover']);
    }
}
