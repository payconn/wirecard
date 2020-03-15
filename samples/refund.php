<?php

require_once __DIR__.'/../vendor/autoload.php';

use Payconn\Wirecard;
use Payconn\Wirecard\Model\Refund;
use Payconn\Wirecard\Token;

$token = new Token('<YOUR_USER_CODE>', '<YOUR_PIN>');
$refund = new Refund();
$refund->setTestMode(true);
$refund->setOrderId('<YOUR-ORDER-ID>');
$response = (new Wirecard($token))->refund($refund);
var_dump($response->getResponseBody());
