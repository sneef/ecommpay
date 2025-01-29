<?php

namespace App\RequestValidation;

use App\Interfaces\ValidationInterface;

/**
 * Реализация валидации для handler-а
 */
class HandlerValidation implements ValidationInterface
{
    public static function validate($dataFields) : bool
    {
        $validationFields = ['type'];

        return ! (bool) array_diff_key(array_flip($validationFields), $dataFields);
    }
}