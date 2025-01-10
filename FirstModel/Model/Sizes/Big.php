<?php

namespace Shezo\FirstModel\Model;

use Shezo\FirstModel\Api\SizeInterface;

class Big implements SizeInterface
{
    public function getSize(): string
    {
       return 'Big';
    }

}

