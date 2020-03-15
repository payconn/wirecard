<?php

namespace Payconn\Wirecard\Model;

use Payconn\Common\AbstractModel;
use Payconn\Common\Model\PurchaseInterface;
use Payconn\Common\Traits\Amount;
use Payconn\Common\Traits\CreditCard;
use Payconn\Common\Traits\Currency;
use Payconn\Common\Traits\OrderId;
use Payconn\Common\Traits\ReturnUrl;
use Payconn\Wirecard\Traits\CardToken;
use Payconn\Wirecard\Traits\Description;
use Payconn\Wirecard\Traits\Installment;

class Purchase extends AbstractModel implements PurchaseInterface
{
    use CreditCard;
    use Amount;
    use Installment;
    use Currency;
    use OrderId;
    use ReturnUrl;
    use CardToken;
    use Description;
}
