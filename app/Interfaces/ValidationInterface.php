<?php

namespace App\Interfaces;

interface ValidationInterface
{
    public static function validate(array $fields) : bool;
}