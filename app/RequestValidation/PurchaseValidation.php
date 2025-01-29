<?php

namespace App\RequestValidation;

use App\Interfaces\ValidationInterface;

class PurchaseValidation implements ValidationInterface
{
    public static function validate($dataFields) : bool
    {
        $validationFields = [
            'payment_id',
            'amount',
            'currency',
            'pan',
            'project_id'
        ];

        //print_r(array_diff_key(array_flip($validationFields), $dataFields));

        return ! (bool) array_diff_key(array_flip($validationFields), $dataFields);
    }
}