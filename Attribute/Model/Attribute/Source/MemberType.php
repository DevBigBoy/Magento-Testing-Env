<?php

namespace Shezo\Attribute\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class MemberType extends AbstractSource
{
    public function getAllOptions()
    {
        return [
            ['label' => __('Standard'), 'value' => 1],
            ['label' => __('Premium'), 'value' => 2],
            ['label' => __('VIP'), 'value' => 3]
        ];
    }
}
