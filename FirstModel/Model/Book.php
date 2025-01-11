<?php

declare(strict_types=1);

namespace Shezo\FirstModel\Model;

use Shezo\FirstModel\Api\ColorInterface;
use Shezo\FirstModel\Api\SizeInterface;

class Book
{

    public function __construct(
       protected ColorInterface $color,
       protected SizeInterface $size
    )
    {}
}
