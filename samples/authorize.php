<?php

require_once __DIR__.'/../vendor/autoload.php';

use Payconn\Common\CreditCard;
use Payconn\Wirecard;
use Payconn\Wirecard\Model\Authorize;
use Payconn\Wirecard\Token;

$token = new Token('<YOUR_USER_CODE>', '<YOUR_PIN>');
$authorize = new Authorize();
$authorize->setTestMode(true);
$authorize->setAmount(100);
$authorize->setInstallment(1);
$authorize->setDescription('Test payment');
$authorize->setCreditCard((new CreditCard('4111111111111111', '2024', '01', '123'))->setHolderName('Murat Sac'));
$authorize->setSuccessfulUrl('https://SUCCES-URL');
$authorize->setFailureUrl('https://FAILURE-URL');
$response = (new Wirecard($token))->authorize($authorize);
var_dump($response->getResponseBody());
