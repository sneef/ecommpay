<?php

use App\Api\{
    Payout,
    Purchase,
    Refund
};
use App\LocalStorage\Database;
use App\Integration\Client;
use App\RequestValidation\{
    HandlerValidation,
    PayoutValidation,
    PurchaseValidation,
    RefundValidation
};

/**
 * Обработчик запросов
 */
class RequestHandler {
    private $database;
    private $client;

    public function __construct() {
        $this->database = new Database();
        $this->client = new Client();
    }

    public function handle($request) {
        if (! HandlerValidation::validate($request)) {
            throw new Exception('Request isn`t allowed');
        }

        $isOperationSuccess = false;
        $status = 'failure';
        $requestType = $request['type'];
        $operationId = uniqid($requestType);
        $operation = false;

        switch ($requestType) {
            case 'purchase':
                if (! PurchaseValidation::validate($request)) {
                    break;
                }
                $operation = new Purchase($this->client, $request);
                break;
            case 'refund':
                
                if (! RefundValidation::validate($request)
                    || ! $purchaseDetails = Database::purchaseDetails($request['payment_id'])
                ) {
                    break;
                }
                //дополняем запрос данными: pan/currency
                $purchaseDetails = array_intersect_key($purchaseDetails, array_flip(['pan', 'currency']));
                $request = array_merge($request, $purchaseDetails);
                $operation = new Refund($this->client, $request);
                break;
            case 'payout':
                if (! PayoutValidation::validate($request)) {
                    break;
                }
                $operation = new Payout($this->client, $request);
                break;
            default:
                $requestType = 'undefined';
        }

        if (
            $operation
            && $isOperationSuccess = $operation->execute()
        ) {
            $status = 'success';
        }

        //Закидываем результат операции в БД:
        $this->database->insertOperation($operationId, $requestType, $status);

        //код ответа сервера:
        http_response_code($isOperationSuccess ? 200 : 400);

        return $isOperationSuccess;
    }
}