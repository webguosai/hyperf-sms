<?php

namespace Webguosai\HyperfSms\Contract;

interface SmsInterface
{
    public function send(string $mobile, string $message, string $templateKey = '', array $params = []);
}