<?php

namespace Payconn\Wirecard\Traits;

use Payconn\Wirecard\Model\CardToken as CardTokenModel;

trait CardToken
{
    /**
     * @var CardTokenModel|null
     */
    protected $cardToken;

    public function getCardToken(): ?CardTokenModel
    {
        return $this->cardToken;
    }

    public function setCardToken(?CardTokenModel $cardToken): void
    {
        $this->cardToken = $cardToken;
    }
}
