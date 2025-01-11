<?php

namespace Shezo\FirstModel\Model\Colors;

use Shezo\FirstModel\Api\ColorInterface;

class Yellow implements ColorInterface
{

    public function getColor(): string
    {
       return 'Yellow';
    }
}

