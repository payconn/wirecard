<?php

require_once __DIR__.'/../vendor/autoload.php';

use Payconn\Common\CreditCard;
use Payconn\Wirecard;
use Payconn\Wirecard\Model\Purchase;
use Payconn\Wirecard\Token;

$token = new Token('<YOUR_USER_CODE>', '<YOUR_PIN>');
$purchase = new Purchase();
$purchase->setTestMode(true);
$purchase->setAmount(100);
$purchase->setInstallment(1);
$purchase->setCreditCard((new CreditCard('4111111111111111', '2024', '01', '123'))->setHolderName('Murat Sac'));
$purchase->generateOrderId();
$response = (new Wirecard($token))->purchase($purchase);
var_dump($response->getResponseBody());
