<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use function Hyperf\Support\make;

class SmsFactory
{
    public function __construct(private ConfigInterface $config)
    {
    }

    public function get(string $name)
    {
        $option = $this->config->get('sms.driver.' . $name, []);

        return make($option['driver'], ['config' => $option['config']]);
    }
}