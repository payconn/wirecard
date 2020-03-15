<?php

namespace Payconn\Wirecard\Traits;

use Payconn\Wirecard\Model\CartToken as CartTokenModel;

trait CardToken
{
    /**
     * @var CartTokenModel|null
     */
    protected $cardToken;

    public function getCardToken(): ?CartTokenModel
    {
        return $this->cardToken;
    }

    public function setCardToken(?CartTokenModel $cardToken): void
    {
        $this->cardToken = $cardToken;
    }
}
