<?php

namespace Payconn\Wirecard\Request;

use Payconn\Common\AbstractRequest;
use Payconn\Common\HttpClient;
use Payconn\Common\ResponseInterface;
use Payconn\Wirecard\Model\Purchase;
use Payconn\Wirecard\Response\PurchaseResponse;
use Payconn\Wirecard\Token;

class PurchaseRequest extends AbstractRequest
{
    public function send(): ResponseInterface
    {
        /** @var Purchase $model */
        $model = $this->getModel();
        /** @var Token $token */
        $token = $this->getToken();

        $builder = (new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><WIRECARD></WIRECARD>'));
        $builder->addChild('ServiceType', 'CCProxy');
        $builder->addChild('OperationType', 'Sale');
        $builder->addChild('CurrencyCode', 'TRY');
        $builder->addChild('IPAddress', $this->getIpAddress());
        $builder->addChild('InstallmentCount', strval($model->getInstallment()));
        $builder->addChild('Description', $model->getDescription());
        $builder->addChild('PaymentContent', $model->getDescription());

        $tokenBuilder = $builder->addChild('Token');
        $tokenBuilder->addChild('UserCode', $token->getUserCode());
        $tokenBuilder->addChild('Pin', $token->getPin());

        $cardToken = $model->getCardToken();
        $cardTokenBuilder = $builder->addChild('CardTokenization');
        $cardTokenBuilder->addChild('RequestType', '0');
        if ($cardToken) {
            $cardTokenBuilder->addChild('RequestType', '1');
            $cardTokenBuilder->addChild('CustomerId', $cardToken->getCustomerId());
            $cardTokenBuilder->addChild('ValidityPeriod', strval($cardToken->getValidityPeriod()));
            if ($ccTokenId = $cardToken->getCcTokenId()) {
                $cardTokenBuilder->addChild('CCTokenId', $ccTokenId);
            }
        }

        $creditCardInfo = $builder->addChild('CreditCardInfo');
        $creditCardInfo->addChild('CreditCardNo', $model->getCreditCard()->getNumber());
        $creditCardInfo->addChild('OwnerName', $model->getCreditCard()->getHolderName());
        $creditCardInfo->addChild('ExpireYear', $model->getCreditCard()->getExpireYear());
        $creditCardInfo->addChild('ExpireMonth', $model->getCreditCard()->getExpireMonth());
        $creditCardInfo->addChild('Cvv', $model->getCreditCard()->getCvv());
        $creditCardInfo->addChild('Price', strval($model->getAmount() * 100));

        /** @var HttpClient $httpClient */
        $httpClient = $this->getHttpClient();
        $response = $httpClient->request('POST', $model->getBaseUrl(), [
            'body' => $builder->asXML(),
        ]);

        return new PurchaseResponse($this->getModel(), (array) @simplexml_load_string($response->getBody()->getContents()));
    }
}
