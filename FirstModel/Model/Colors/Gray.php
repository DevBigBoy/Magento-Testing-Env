<?php

namespace Shezo\FirstModel\Model\Colors;

use Shezo\FirstModel\Api\ColorInterface;

class Gray implements ColorInterface
{

    public function getColor(): string
    {
       return 'gray';
    }
}

