<?php

namespace Shezo\FirstModel\NotMagento;

class YellowPencil implements PencilInterface
{

    public function getPencilType(): string
    {
        return 'yellow pencil';
    }
}
