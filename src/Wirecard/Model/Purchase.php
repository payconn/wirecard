<?php

namespace Payconn\Wirecard\Model;

use Payconn\Common\AbstractModel;
use Payconn\Common\Model\PurchaseInterface;
use Payconn\Common\Traits\Amount;
use Payconn\Common\Traits\CreditCard;
use Payconn\Common\Traits\Currency;
use Payconn\Common\Traits\OrderId;
use Payconn\Common\Traits\ReturnUrl;
use Payconn\Wirecard\Traits\Installment;

class Purchase extends AbstractModel implements PurchaseInterface
{
    use CreditCard;
    use Amount;
    use Installment;
    use Currency;
    use OrderId;
    use ReturnUrl;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var CartToken|null
     */
    protected $cardToken;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCardToken(): ?CartToken
    {
        return $this->cardToken;
    }

    public function setCardToken(?CartToken $cardToken): void
    {
        $this->cardToken = $cardToken;
    }
}
