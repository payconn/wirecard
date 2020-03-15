<?php

namespace Payconn\Wirecard\Request;

use Payconn\Common\AbstractRequest;
use Payconn\Common\HttpClient;
use Payconn\Common\ResponseInterface;
use Payconn\Wirecard\Model\Refund;
use Payconn\Wirecard\Response\RefundResponse;
use Payconn\Wirecard\Token;

class RefundRequest extends AbstractRequest
{
    public function send(): ResponseInterface
    {
        /** @var Refund $model */
        $model = $this->getModel();
        /** @var Token $token */
        $token = $this->getToken();

        $builder = (new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><WIRECARD></WIRECARD>'));
        $builder->addChild('ServiceType', 'WDRefundService');
        $builder->addChild('OperationType', 'RefundPayment');
        $builder->addChild('MPAY');
        $builder->addChild('OrderObjectId', $model->getOrderId());

        $tokenBuilder = $builder->addChild('Token');
        $tokenBuilder->addChild('UserCode', $token->getUserCode());
        $tokenBuilder->addChild('Pin', $token->getPin());

        /** @var HttpClient $httpClient */
        $httpClient = $this->getHttpClient();
        $response = $httpClient->request('POST', $model->getBaseUrl(), [
            'body' => $builder->asXML(),
        ]);

        return new RefundResponse($this->getModel(), (array) @simplexml_load_string($response->getBody()->getContents()));
    }
}
