<?php

namespace Shezo\FirstModel\NotMagento;

use Shezo\FirstModel\Api\PencilInterface;

class RedPencil implements PencilInterface
{
    public function getPencilType(): string
    {
       return 'Red Pencil';
    }
}
