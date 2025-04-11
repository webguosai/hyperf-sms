<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Contract;

interface SmsInterface
{
    /**
     * 发送短信
     * @param string $mobile
     * @param array $message
     * @return void
     */
    public function send(string $mobile, array $message): void;

    /**
     * 获取驱动
     * @return string
     */
    public function getDriver(): string;

    /**
     * 获取名称
     * @return string
     */
    public function getName(): string;
}