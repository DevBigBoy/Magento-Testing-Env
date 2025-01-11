<?php

namespace Shezo\FirstModel\Model\Colors;

use Shezo\FirstModel\Api\ColorInterface;

class Red implements ColorInterface
{

    public function getColor(): string
    {
       return 'red';
    }
}

