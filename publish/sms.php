<?php

return [
    // 默认驱动
    'default' => 'qiniu',
    'driver'  => [
        'qiniu'   => [
            'driver' => \Webguosai\HyperfSms\Driver\Qiniu::class,
            // 驱动需要初始化传递的参数
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
