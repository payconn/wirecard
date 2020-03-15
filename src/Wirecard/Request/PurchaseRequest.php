<?php

namespace Payconn\Wirecard\Request;

use Payconn\Common\AbstractRequest;
use Payconn\Common\HttpClient;
use Payconn\Common\ResponseInterface;
use Payconn\Wirecard\Model\Purchase;
use Payconn\Wirecard\Response\PurchaseResponse;

class PurchaseRequest extends AbstractRequest
{
    public function send(): ResponseInterface
    {
        /** @var Purchase $model */
        $model = $this->getModel();

        $builder = (new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><WIRECARD></WIRECARD>'));
        $builder->addChild('ServiceType', 'CCProxy');
        $builder->addChild('OperationType', 'Sale');
        $builder->addChild('CurrencyCode', 'TRY');
        $builder->addChild('IPAddress', $this->getIpAddress());
        $builder->addChild('InstallmentCount', 1 == $model->getInstallment() ? 0 : $model->getInstallment());

        $token = $builder->addChild('Token');
        $token->addChild('UserCode', $this->getToken()->getUserCode());
        $token->addChild('Pin', $this->getToken()->getPin());

        $creditCardInfo = $builder->addChild('CreditCardInfo');
        $creditCardInfo->addChild('CreditCardNo', $model->getCreditCard()->getNumber());
        $creditCardInfo->addChild('OwnerName', $model->getCreditCard()->getHolderName());
        $creditCardInfo->addChild('ExpireYear', $model->getCreditCard()->getExpireYear());
        $creditCardInfo->addChild('ExpireMonth', $model->getCreditCard()->getExpireMonth());
        $creditCardInfo->addChild('Cvv', $model->getCreditCard()->getCvv());
        $creditCardInfo->addChild('Price', $model->getAmount());

        /** @var HttpClient $httpClient */
        $httpClient = $this->getHttpClient();
        $response = $httpClient->request('POST', $model->getBaseUrl(), [
            'body' => $builder->asXML(),
        ]);

        return new PurchaseResponse($this->getModel(), (array) @simplexml_load_string($response->getBody()->getContents()));
    }
}
