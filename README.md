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
- hyperf >= 3.1

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
return [
    // 默认驱动
    'default' => 'qiniu',
    'driver'  => [
        'qiniu'      => [
            // 驱动名称
            'name'   => '七牛云短信',
            'driver' => \Webguosai\HyperfSms\Driver\Qiniu::class,
            // 驱动初始化参数
            'config' => [
                'access_key' => '',
                'secret_key' => '',
            ]
        ],
        'smschinese' => [
            'name'   => '中国网建',
            'driver' => \Webguosai\HyperfSms\Driver\Smschinese::class,
            'config' => [
                'uid' => '',
                'key' => '',
            ]
        ],
        'aliyun'     => [
            'name'   => '阿里云短信',
            'driver' => \Webguosai\HyperfSms\Driver\Aliyun::class,
            'config' => [
                'accessKeyId'     => '',
                'accessKeySecret' => '',
                'regionId'        => '',
                'signName'        => '',
            ]
        ],
    ]
];
```

## 使用

- 写法一

```php
sms()->send('18888888888', [
    'template' => 'xxx',
    'content' => '您的验证码是1234，该验证码1分钟内有效，请勿泄漏于他人！',
    'data' => [
        'code' => '1234'
    ]
]);
```

- 写法二

```php
use Webguosai\HyperfSms\Contract\SmsInterface;

$sms = di(SmsInterface::class);
$sms->send('18888888888', [
    'template' => 'xxx',
    'content' => '您的验证码是1234，该验证码1分钟内有效，请勿泄漏于他人！',
    'data' => [
        'code' => '1234'
    ]
]);
```

### 自定义驱动

```php
$sms = \Webguosai\HyperfSms\Facade\Sms::driver('qiniu');
// 或 
// $sms = \Webguosai\HyperfSms\Facade\Sms::make('qiniu');

$sms->send('18888888888', [
    'template' => 'xxx',
    'content' => '您的验证码是1234，该验证码1分钟内有效，请勿泄漏于他人！',
    'data' => [
        'code' => '1234'
    ]
]);
```

### 闭包发送

```php
sms()->send('18888888888', [
    'content'  => function($driver){
        if ($driver == 'aliyun') {
            return '云片专用验证码：1235';
        }
        return '您的验证码为: 6379';
    },
    'template' => function($driver){
        if ($driver == 'aliyun') {
            return '1888883905033940992';
        }
        return 'SMS_001';
    },
    'data' => function($driver){
        return [
            'code' => 6379
        ];
    }
]);
```



## License

MIT
