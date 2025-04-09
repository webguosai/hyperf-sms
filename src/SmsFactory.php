<?php

namespace Webguosai\HyperfSms;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

class SmsFactory
{
    public function __construct(private ConfigInterface $config)
    {
    }

    public function get(string $name)
    {
        $option = $this->config->get('sms.driver.'.$name, [

        ]);

        return $option['driver']($option['config']);
    }
}