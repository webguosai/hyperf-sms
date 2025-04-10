<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use InvalidArgumentException;
use function Hyperf\Support\make;

class SmsFactory
{
    public function __construct(private ConfigInterface $config)
    {
    }

    public function make(string $name)
    {
        $option = $this->config->get('sms.driver.' . $name, []);

        if (empty($option)) {
            throw new InvalidArgumentException("短信配置文件缺少[{$name}]驱动!");
        }

        return make($option['driver'], ['config' => $option['config']]);
    }
}