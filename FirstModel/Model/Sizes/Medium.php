<?php

namespace Shezo\FirstModel\Model;

use Shezo\FirstModel\Api\SizeInterface;

class Medium implements SizeInterface
{
    public function getSize(): string
    {
       return 'medium';
    }

}

