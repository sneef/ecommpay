<?php

namespace App\Api;

class Refund {
    private $client;
    private $request;

    public function __construct($client, $request) {
        $this->client = $client;
        $this->request = $request;
    }

    public function execute() {
        $data = [
            'payment_id' => $this->request['payment_id'],
            'amount' => $this->request['amount'],
            'operation_id' => $this->request['operation_id'],
            'pan' => $this->request['pan'],
            'currency' => $this->request['currency'],
            'project_id' => $this->request['project_id']
        ];

        $responseCode = $this->client->sendRequest('refund', $data, $this->request['project_id']);

        return $responseCode === 200;
    }
}