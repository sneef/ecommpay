<?php

class Purchase {
    private $client;
    private $request;

    public function __construct($client, $request) {
        $this->client = $client;
        $this->request = $request;
    }

    public function execute() {
        $url = 'http://example.com/purchase';
        $data = [
            'amount' => $this->request['amount'],
            'currency' => $this->request['currency'],
            'pan' => $this->request['pan'],
            'project_id' => $this->request['project_id']
        ];

        $responseCode = $this->client->sendRequest($url, $data, 'json');

        return $responseCode === 200;
    }
}