<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Facade;

use Hyperf\Context\ApplicationContext;
use Webguosai\HyperfSms\Contract\SmsInterface;
use Webguosai\HyperfSms\SmsFactory;

/**
 * @method static SmsInterface make(string $driver)
 */
class Sms
{
    public static function __callStatic($name, $arguments)
    {
        return self::driver(...$arguments);
    }

    public static function driver(string $driver): SmsInterface
    {
        /**
         * @var SmsFactory $factory
         */
        $factory = ApplicationContext::getContainer()->get(SmsFactory::class);

        return $factory->make($driver);
    }
}