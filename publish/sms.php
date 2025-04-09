<?php

return [
    'default' => 'chinese',
    'driver' => [
        'chinese' => [
            'driver' => \Webguosai\HyperfSms\Driver\Chinese::class,
            'config' => [
                'uid' => '',
                'key' => '',
            ]
        ],
        // 'ali'     => [
        //     'driver' => \Webguosai\HyperfSms\Adapter\AliAdapterFactory::class,
        //     'config' => [
        //         'accessKeyId'     => '',
        //         'accessKeySecret' => '',
        //         'regionId'        => '',
        //         'signName'        => '',
        //     ]
        // ]
    ]
];
