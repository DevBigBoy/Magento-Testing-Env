<?php

declare(strict_types=1);

namespace Shezo\AnimalLovers\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerExtensionFactory;
use Shezo\AnimalLovers\Model\ResourceModel\CustomerPetPreference as CustomerResource;

class CustomerRepositoryPlugin
{
    protected $extensionFactory;
    protected $customerResource;

    public function __construct(
        CustomerExtensionFactory $extensionFactory,
        CustomerResource $customerResource
    ) {
        $this->extensionFactory = $extensionFactory;
        $this->customerResource = $customerResource;
    }

    public function afterGetById(
        CustomerRepositoryInterface $subject,
                                    $customer
    ) {
        $extensionAttributes = $customer->getExtensionAttributes();
        if (!$extensionAttributes) {
            $extensionAttributes = $this->extensionFactory->create();
        }

        $customerData = $this->customerResource->getCustomerPreferences($customer->getId());
        $extensionAttributes->setIsDogLover($customerData['is_dog_lover']);
        $extensionAttributes->setIsCatLover($customerData['is_cat_lover']);
        $customer->setExtensionAttributes($extensionAttributes);

        return $customer;
    }
}
