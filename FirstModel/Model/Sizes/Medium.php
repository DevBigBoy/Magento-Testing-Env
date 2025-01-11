<?php

namespace Shezo\FirstModel\Model\Sizes;

use Shezo\FirstModel\Api\SizeInterface;

class Medium implements SizeInterface
{
    public function getSize(): string
    {
       return 'medium';
    }

}

