<p align="center">
<a href="https://www.wirecard.com.tr/"><img width="200" src="https://www.wirecard.com/assets/media/Logos/wirecard_dark.svg"></a>
</p>

<h3 align="center">Payconn: Wirecard</h3>

<p align="center">Wirecard (Bonus, World, CardFinans, Maximum, Paraf, Advantage) gateway for Payconn payment processing library</p>
<p align="center">
  <a href="https://travis-ci.com/payconn/wirecard"><img src="https://travis-ci.com/payconn/wirecard.svg?branch=master" /></a>
</p>
<hr>

<p align="center">
<b><a href="#installation">Installation</a></b>
|
<b><a href="#supported-methods">Supported Methods</a></b>
|
<b><a href="#basic-usages">Basic Usages</a></b>
</p>
<hr>
<br>

## Installation

    $ composer require payconn/wirecard

## Supported methods
* purchase
* authorize
* refund

## Basic Usages

```php
use Payconn\Common\CreditCard;
use Payconn\Wirecard;
use Payconn\Wirecard\Model\Purchase;
use Payconn\Wirecard\Token;

$token = new Token('<YOUR-USER-CODE>', '<YOUR-PIN>');
$purchase = new Purchase();
$purchase->setTestMode(true);
$purchase->setAmount(100);
$purchase->setInstallment(1);
$purchase->setDescription('<YOUR-DESCRIPTION>');
$purchase->setCreditCard((new CreditCard('4111111111111111', '2024', '01', '123'))
    ->setHolderName('<CARD-HOLDER-NAME>'));
$purchase->generateOrderId();
$response = (new Wirecard($token))->purchase($purchase);
```

## Change log

Please see [UPGRADE](UPGRADE.md) for more information on how to upgrade to the latest version.

## Support

If you are having general issues with Payconn, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/payconn/nestpay/issues),
or better yet, fork the library and submit a pull request.


## Security

If you discover any security related issues, please email muratsac@mail.com instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
