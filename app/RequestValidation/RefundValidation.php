<?php

namespace App\RequestValidation;

use App\Interfaces\ValidationInterface;

class RefundValidation implements ValidationInterface
{
    public static function validate($dataFields) : bool
    {
        $validationFields = [
            'payment_id',
            'amount',
            'operation_id',
            'project_id'
        ];

        return ! (bool) array_diff_key(array_flip($validationFields), $dataFields);
    }
}