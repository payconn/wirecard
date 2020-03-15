<?php

namespace Payconn;

use Payconn\Common\AbstractGateway;
use Payconn\Common\BaseUrl;
use Payconn\Common\Exception\NotSupportedMethodException;
use Payconn\Common\Model\AuthorizeInterface;
use Payconn\Common\Model\CancelInterface;
use Payconn\Common\Model\CompleteInterface;
use Payconn\Common\Model\PurchaseInterface;
use Payconn\Common\Model\RefundInterface;
use Payconn\Common\ResponseInterface;
use Payconn\Wirecard\Request\AuthorizeRequest;
use Payconn\Wirecard\Request\PurchaseRequest;
use Payconn\Wirecard\Request\RefundRequest;

class Wirecard extends AbstractGateway
{
    public function initialize(): void
    {
        $this->setBaseUrl((new BaseUrl())
            ->setProdUrls('https://www.wirecard.com.tr/SGate/Gate', 'https://www.wirecard.com.tr/SGate/Gate')
            ->setTestUrls('https://www.wirecard.com.tr/SGate/Gate', 'https://www.wirecard.com.tr/SGate/Gate')
        );
    }

    /**
     * @throws Common\Exception\NotFoundClassException
     */
    public function authorize(AuthorizeInterface $model): ResponseInterface
    {
        return $this->createRequest(AuthorizeRequest::class, $model);
    }

    /**
     * @throws Common\Exception\NotFoundClassException
     */
    public function purchase(PurchaseInterface $model): ResponseInterface
    {
        return $this->createRequest(PurchaseRequest::class, $model);
    }

    /**
     * @throws Common\Exception\NotFoundClassException
     */
    public function refund(RefundInterface $model): ResponseInterface
    {
        return $this->createRequest(RefundRequest::class, $model);
    }

    /**
     * @throws NotSupportedMethodException
     */
    public function cancel(CancelInterface $model): ResponseInterface
    {
        throw new NotSupportedMethodException();
    }

    /**
     * @throws NotSupportedMethodException
     */
    public function complete(CompleteInterface $model): ResponseInterface
    {
        throw new NotSupportedMethodException();
    }
}
