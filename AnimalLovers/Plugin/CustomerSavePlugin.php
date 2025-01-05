<?php

declare(strict_types=1);

namespace Shezo\AnimalLovers\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Shezo\AnimalLovers\Model\ResourceModel\CustomerPetPreference as CustomerResource;

class CustomerSavePlugin
{
    protected $customerResource;

    public function __construct(CustomerResource $customerResource)
    {
        $this->customerResource = $customerResource;
    }

    public function beforeSave(
        CustomerRepositoryInterface $subject,
                                    $customer
    ) {
        $extensionAttributes = $customer->getExtensionAttributes();
        if ($extensionAttributes) {
            $this->customerResource->saveCustomerPreferences(
                $customer->getId(),
                $extensionAttributes->getIsDogLover(),
                $extensionAttributes->getIsCatLover()
            );
        }
    }
}
