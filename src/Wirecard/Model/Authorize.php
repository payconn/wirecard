<?php

namespace Payconn\Wirecard\Model;

use Payconn\Common\AbstractModel;
use Payconn\Common\Model\AuthorizeInterface;
use Payconn\Common\Traits\Amount;
use Payconn\Common\Traits\CreditCard;
use Payconn\Common\Traits\Currency;
use Payconn\Common\Traits\ReturnUrl;
use Payconn\Wirecard\Traits\CardToken;
use Payconn\Wirecard\Traits\Description;
use Payconn\Wirecard\Traits\Installment;

class Authorize extends AbstractModel implements AuthorizeInterface
{
    use Amount;
    use Installment;
    use Currency;
    use ReturnUrl;
    use CreditCard;
    use CardToken;
    use Description;
}
