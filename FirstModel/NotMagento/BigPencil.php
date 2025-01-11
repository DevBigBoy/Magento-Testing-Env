<?php


namespace Shezo\FirstModel\NotMagento;

use Shezo\FirstModel\Api\PencilInterface;

class BigPencil implements PencilInterface
{

    public function getPencilType(): string
    {
        return 'big_pencil';
    }
}
