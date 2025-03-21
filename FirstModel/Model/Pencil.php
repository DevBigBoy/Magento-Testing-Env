<?php

declare(strict_types=1);

namespace Shezo\FirstModel\Model;

use Shezo\FirstModel\Api\ColorInterface;
use Shezo\FirstModel\Api\SizeInterface;
use Shezo\FirstModel\Api\PencilInterface;

class Pencil implements PencilInterface
{

    public function __construct(
       protected ColorInterface $color,
       protected SizeInterface $size
    )
    {}
    public function getPencilType(): string
    {
        return 'Our Pencil Has '.$this->color->getColor() .' Color and its Size ' .  $this->size->getSize();
    }
}
