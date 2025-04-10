<?php

namespace Webguosai\HyperfSms;

use Hyperf\Stringable\Str;
use Webguosai\HyperfSms\Contract\MessageInterface;

class SmsBase
{
    public function __construct(protected array $config)
    {
    }

    public function formatMessage(array $message): MessageInterface
    {
        return new Message($message);
    }

    public function getName(): string
    {
        return strtolower(Str::afterLast(get_called_class(), '\\'));
    }
}