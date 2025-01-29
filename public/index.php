<?php
require_once 'RequestHandler.php';

try {
    $requestHandler = new RequestHandler();
    $requestHandler->handle($_POST);

} catch(Exception $ex) {
    //return json_encode('');
}