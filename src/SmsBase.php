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

    /**
     * 获取驱动
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * 获取名称
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}