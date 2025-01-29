<?php

namespace App\Api;

class Purchase {
    private $client;
    private $request;

    public function __construct($client, $request) {
        $this->client = $client;
        $this->request = $request;
    }

    public function execute() {
        $data = [
            'amount' => $this->request['amount'],
            'currency' => $this->request['currency'],
            'pan' => $this->request['pan'],
            'project_id' => $this->request['project_id']
        ];

        $responseCode = $this->client->sendRequest('purchase', $data, $this->request['project_id']);

        return $responseCode === 200;
    }
}