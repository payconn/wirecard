<?php

namespace Payconn;

use Payconn\Common\AbstractGateway;
use Payconn\Common\BaseUrl;
use Payconn\Common\Model\AuthorizeInterface;
use Payconn\Common\Model\CancelInterface;
use Payconn\Common\Model\CompleteInterface;
use Payconn\Common\Model\PurchaseInterface;
use Payconn\Common\Model\RefundInterface;
use Payconn\Common\ResponseInterface;
use Payconn\Wirecard\Request\PurchaseRequest;

class Wirecard extends AbstractGateway
{
    public function initialize(): void
    {
        $this->setBaseUrl((new BaseUrl())
            ->setProdUrls('https://www.wirecard.com.tr/SGate/Gate', 'https://www.wirecard.com.tr/SGate/Gate')
            ->setTestUrls('https://www.wirecard.com.tr/SGate/Gate', 'https://www.wirecard.com.tr/SGate/Gate')
        );
    }

    public function authorize(AuthorizeInterface $model): ResponseInterface
    {
        // TODO: Implement authorize() method.
    }

    public function complete(CompleteInterface $model): ResponseInterface
    {
        // TODO: Implement complete() method.
    }

    /**
     * @throws Common\Exception\NotFoundClassException
     */
    public function purchase(PurchaseInterface $model): ResponseInterface
    {
        return $this->createRequest(PurchaseRequest::class, $model);
    }

    public function refund(RefundInterface $model): ResponseInterface
    {
        // TODO: Implement refund() method.
    }

    public function cancel(CancelInterface $model): ResponseInterface
    {
        // TODO: Implement cancel() method.
    }
}
