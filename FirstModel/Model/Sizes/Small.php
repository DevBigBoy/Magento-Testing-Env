<?php

namespace Shezo\FirstModel\Model;

use Shezo\FirstModel\Api\SizeInterface;

class Small implements SizeInterface
{
    public function getSize(): string
    {
       return 'Small';
    }

}

