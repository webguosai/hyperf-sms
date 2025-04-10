<h1 align="center">hyperf-sms</h1>

<p align="center">
<a href="https://packagist.org/packages/webguosai/hyperf-sms"><img src="https://poser.pugx.org/webguosai/hyperf-sms/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/webguosai/hyperf-sms"><img src="https://poser.pugx.org/webguosai/hyperf-sms/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/webguosai/hyperf-sms"><img src="https://poser.pugx.org/webguosai/hyperf-sms/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/webguosai/hyperf-sms"><img src="https://poser.pugx.org/webguosai/hyperf-sms/license" alt="License"></a>
</p>


## 运行环境

- php >= 8.1
- composer

## 安装

```bash
composer require webguosai/hyperf-sms -vvv
```

发布配置

```bash
php bin/hyperf.php vendor:publish webguosai/hyperf-sms
```

## 配置

```php


```

## 使用

- 写法一

```php
sms()->send('18888888888', '您的验证码是1234，该验证码1分钟内有效，请勿泄漏于他人！');
```

- 写法二

```php
use Webguosai\HyperfSms\Contract\SmsInterface;

$sms = di(SmsInterface::class);
$sms->send('18888888888', '您的验证码是1234，该验证码1分钟内有效，请勿泄漏于他人！');
```


自定义驱动

```php
$sms = \Webguosai\HyperfSms\Facade\Sms::driver('chinese');
// 或 
// $sms = \Webguosai\HyperfSms\Facade\Sms::make('chinese');

$sms->send('18888888888', '您的验证码是1234，该验证码1分钟内有效，请勿泄漏于他人！');
```

## License

MIT
