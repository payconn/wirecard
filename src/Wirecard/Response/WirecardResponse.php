<?php

namespace Payconn\Wirecard\Response;

use Payconn\Common\AbstractResponse;
use Payconn\Common\ModelInterface;

abstract class WirecardResponse extends AbstractResponse
{
    protected array $response;

    public function __construct(ModelInterface $model, array $parameters)
    {
        parent::__construct($model, $parameters);

        foreach ($parameters['Item'] as $item) {
            $this->response[strval($item->attributes()->Key)] = strval($item->attributes()->Value);
        }
    }

    public function isSuccessful(): bool
    {
        return !(bool) $this->response['StatusCode'];
    }

    public function getResponseMessage(): string
    {
        return $this->response['ResultMessage'];
    }

    public function getResponseCode(): string
    {
        return $this->response['ResultCode'];
    }

    public function getResponseBody(): array
    {
        return $this->response;
    }

    public function isRedirection(): bool
    {
        return false;
    }

    public function getRedirectForm(): ?string
    {
        return null;
    }
}
