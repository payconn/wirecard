<?php

namespace Payconn\Wirecard;

use Payconn\Common\TokenInterface;

class Token implements TokenInterface
{
    private $userCode;

    private $pin;

    public function __construct(string $userCode, string $pin)
    {
        $this->userCode = $userCode;
        $this->pin = $pin;
    }

    public function getUserCode(): string
    {
        return $this->userCode;
    }

    public function getPin(): string
    {
        return $this->pin;
    }
}
