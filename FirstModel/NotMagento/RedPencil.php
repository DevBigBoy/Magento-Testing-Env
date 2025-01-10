<?php

namespace Shezo\FirstModel\NotMagento;

class RedPencil implements PencilInterface
{
    public function getPencilType(): string
    {
       return 'Red Pencil';
    }
}
