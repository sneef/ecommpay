<?php
// Пример тестового кейса для операции Purchase
function testPurchase() {
    $request = [
        'type' => 'purchase',
        'amount' => 1000,
        'currency' => 'USD',
        'pan' => '1234567890123456',
        'project_id' => '1'
    ];

    $requestHandler = new RequestHandler();
    $requestHandler->handle($request);
}

// Аналогично для Refund и Payout
testPurchase();