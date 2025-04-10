<?php

return [
    'default' => 'qiniu',
    'driver'  => [
        'qiniu'   => [
            'driver' => \Webguosai\HyperfSms\Driver\Qiniu::class,
            'config' => [
                'access_key' => '',
                'secret_key' => '',
            ]
        ],
        'smschinese' => [
            'driver' => \Webguosai\HyperfSms\Driver\Smschinese::class,
            'config' => [
                'uid' => '',
                'key' => '',
            ]
        ],
        'aliyun'     => [
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
