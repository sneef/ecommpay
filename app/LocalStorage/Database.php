<?php

namespace App\LocalStorage;

class Database {
    private static $testData = [
        [
            'payment_id' => 1,
            'amount' => 9.99,
            'currency' => 'USD',
            'pan' => '2593748987499873',
            'project_id' => '2001'
        ],
        [
            'payment_id' => 2,
            'amount' => 25.31,
            'currency' => 'RUR',
            'pan' => '2593748987499874',
            'project_id' => '2002'
        ],
    ];

    /**
     * Вставка в бд информации о результате
     */
    public function insertOperation($operationId, $type, $status) {
        // Заглушка для записи операции в базу данных
        //считаем результат всегда положительным:
        return true;
    }

    /**
     * Поиск покупки по id
     * 
     * @param $paymentId - Номер платежа
     * @return array|null
     */
    public static function purchaseDetails($paymentId) {
        
        foreach(self::$testData as $payment) {
            if ($payment['payment_id'] == $paymentId) {
                return $payment;
            }
        }

        return null;
    }
}