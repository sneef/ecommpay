<?php

class Refund {
    private $client;
    private $request;

    public function __construct($client, $request) {
        $this->client = $client;
        $this->request = $request;
    }

    public function execute() {
        $url = 'http://example.com/refund';
        $data = [
            'amount' => $this->request['amount'],
            'operation_id' => $this->request['operation_id'],
            'project_id' => $this->request['project_id']
        ];

        $responseCode = $this->client->sendRequest($url, $data, 'json');

        return $responseCode === 200;
    }
}