<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

class Sms
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $driver = $config->get('sms.default', 'qiniu');

        /**
         * @var SmsFactory $factory
         */
        $factory = $container->get(SmsFactory::class);
        return $factory->make($driver);
    }
}