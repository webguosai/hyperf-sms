<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Contract;

interface SmsInterface
{
    public function send(string $mobile, array $message);

    public function getDriver();

    public function getName();
}