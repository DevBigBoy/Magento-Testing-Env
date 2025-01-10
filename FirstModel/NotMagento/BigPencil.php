<?php


namespace Shezo\FirstModel\NotMagento;

class BigPencil implements PencilInterface
{

    public function getPencilType(): string
    {
        return 'big_pencil';
    }
}
