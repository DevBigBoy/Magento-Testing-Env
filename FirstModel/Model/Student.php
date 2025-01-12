<?php

namespace Shezo\FirstModel\Model;

class Student
{
    public function __construct(
        private $firstName = 'Mohamed',
        private $age = 43,
        private array $skills = ['cooking' => true, 'programming' => true, 'planning boxing' => true]
    )
    {}

}
