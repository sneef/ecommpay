<?php

//interfaces:
require_once __DIR__ . '/app/Interfaces/ValidationInterface.php';

//requests validations:
require_once __DIR__ . '/app/RequestValidation/HandlerValidation.php';
require_once __DIR__ . '/app/RequestValidation/PayoutValidation.php';
require_once __DIR__ . '/app/RequestValidation/PurchaseValidation.php';
require_once __DIR__ . '/app/RequestValidation/RefundValidation.php';

//classes:
require_once __DIR__ . '/app/LocalStorage/Database.php';
require_once __DIR__ . '/app/Integration/Client.php';

//API classes:
require_once __DIR__ . '/app/Api/Purchase.php';
require_once __DIR__ . '/app/Api/Refund.php';
require_once __DIR__ . '/app/Api/Payout.php';

//handle requests:
require_once 'RequestHandler.php';