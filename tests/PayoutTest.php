<?php

require_once 'loader.php';

// Пример тестового кейса для операции Payout
function testPayout() {
    $request = [
        'type' => 'payout',
        'payment_id' => '35236',
        'amount' => 1000,
        'currency' => 'USD',
        'pan' => '1234567890123456',
        'project_id' => '2001'
    ];

    $requestHandler = new RequestHandler();
    $status = $requestHandler->handle($request);

    echo $status ? "TEST OK\n" : "TEST FAILED\n";
}

testPayout();