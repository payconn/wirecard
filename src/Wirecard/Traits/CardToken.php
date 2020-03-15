<?php

namespace Payconn\Wirecard\Traits;

trait CardToken
{
    /**
     * @var CardToken|null
     */
    protected $cardToken;

    public function getCardToken(): ?CardToken
    {
        return $this->cardToken;
    }

    public function setCardToken(?CardToken $cardToken): void
    {
        $this->cardToken = $cardToken;
    }
}
