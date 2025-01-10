<?php

namespace Shezo\FirstModel\Model;

use Shezo\FirstModel\Api\ColorInterface;

class Gray implements ColorInterface
{

    public function getColor(): string
    {
       return 'gray';
    }
}

