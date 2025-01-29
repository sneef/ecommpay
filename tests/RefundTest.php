<?php

require_once 'loader.php';

// Пример тестового кейса для операции Refund
function testRefund() {
    $request = [
        'type' => 'refund',
        'payment_id' => '2',
        'amount' => 1000,
        'operation_id' => 'USD',
        'project_id' => '2001'
    ];

    $requestHandler = new RequestHandler();
    $status = $requestHandler->handle($request);

    echo $status ? "TEST OK\n" : "TEST FAILED\n";
}

testRefund();