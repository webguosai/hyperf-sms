<?php

namespace Webguosai\HyperfSms;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

class Sms
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $name = $config->get('sms.default', 'chinese');

        /**
         * @var SmsFactory $factory
         */
        $factory = $container->get(SmsFactory::class);
        return $factory->get($name);
    }
}