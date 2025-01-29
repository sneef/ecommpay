<?php
require_once 'Database.php';
require_once 'Client.php';
require_once 'Purchase.php';
require_once 'Refund.php';
require_once 'Payout.php';

class RequestHandler {
    private $database;
    private $client;

    public function __construct() {
        $this->database = new Database();
        $this->client = new Client();
    }

    public function handle($request) {
        $operationId = uniqid();
        $status = 'failure';

        switch ($request['type']) {
            case 'purchase':
                $operation = new Purchase($this->client, $request);
                break;
            case 'refund':
                $operation = new Refund($this->client, $request);
                break;
            case 'payout':
                $operation = new Payout($this->client, $request);
                break;
        }

        if ($operation->execute()) {
            $status = 'success';
        }

        $this->database->insertOperation($operationId, $request['type'], $status);
    }
}