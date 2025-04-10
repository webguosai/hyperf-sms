<?php

declare(strict_types=1);

use Webguosai\HyperfSms\Contract\SmsInterface;

if (!function_exists('sms')) {
    /**
     * 获取APP应用请求实例.
     */
    function sms(): SmsInterface
    {
        return di(SmsInterface::class);
    }
}