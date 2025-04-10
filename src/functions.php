<?php

declare(strict_types=1);

use Hyperf\Context\ApplicationContext;
use Webguosai\HyperfSms\Contract\SmsInterface;

if (!function_exists('sms')) {
    /**
     * 获取APP应用请求实例.
     */
    function sms(): SmsInterface
    {
        $container = ApplicationContext::getContainer();

        return $container->get(SmsInterface::class);
    }
}