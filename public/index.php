<?php
header('Content-Type: application/json; charset=utf-8');

require_once '../loader.php';

try {
    $requestHandler = new RequestHandler();
    $requestHandler->handle($_GET);

} catch(Exception $ex) {
    http_response_code(400);
    echo json_encode([
        'message' => $ex->getMessage(),
        'code' => 400
    ]);
}