<?php

namespace Shezo\FirstModel\NotMagento;

use Shezo\FirstModel\Api\PencilInterface;

class YellowPencil implements PencilInterface
{

    public function getPencilType(): string
    {
        return 'yellow pencil';
    }
}
