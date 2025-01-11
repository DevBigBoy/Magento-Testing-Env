<?php

namespace Shezo\FirstModel\Model\Sizes;

use Shezo\FirstModel\Api\SizeInterface;

class Big implements SizeInterface
{
    public function getSize(): string
    {
       return 'Big';
    }

}

