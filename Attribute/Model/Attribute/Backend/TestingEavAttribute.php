<?php

namespace Shezo\Attribute\Model\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class TestingEavAttribute extends AbstractBackend
{
    public function validate($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());

        // Ensure value is not empty
        if (empty($value)) {
            throw new LocalizedException(__('The Testing EAV Attribute cannot be empty.'));
        }

        // Ensure value has at least 5 characters
        if (strlen($value) < 5) {
            throw new LocalizedException(__('The Testing EAV Attribute must be at least 5 characters long.'));
        }

        // Ensure value has at most 50 characters
        if (strlen($value) > 255) {
            throw new LocalizedException(__('The Testing EAV Attribute cannot exceed 50 characters.'));
        }


        return true;
    }
}
