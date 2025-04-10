<?php

return [
    'default' => 'chinese',
    'driver'  => [
        'chinese' => [
            'driver' => \Webguosai\HyperfSms\Driver\Chinese::class,
            'config' => [
                'uid' => '',
                'key' => '',
            ]
        ],
        'ali'     => [
            'driver' => \Webguosai\HyperfSms\Driver\Ali::class,
            'config' => [
                'accessKeyId'     => '',
                'accessKeySecret' => '',
                'regionId'        => '',
                'signName'        => '',
            ]
        ],
        'qiniu'   => [
            'driver' => \Webguosai\HyperfSms\Driver\Qiniu::class,
            'config' => [
                'access_key' => '',
                'secret_key' => '',
            ]
        ]
    ]
];
