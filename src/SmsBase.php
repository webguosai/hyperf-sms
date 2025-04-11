<?php

namespace Webguosai\HyperfSms;

use Webguosai\HyperfSms\Contract\MessageInterface;

class SmsBase
{
    public function __construct(protected array $config, protected string $driver, protected string $name)
    {
    }

    public function formatMessage(array $message): MessageInterface
    {
        return new Message($message);
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function getName(): string
    {
        return $this->name;
    }
}