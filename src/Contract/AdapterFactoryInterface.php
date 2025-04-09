<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Contract;

interface AdapterFactoryInterface
{
    public function make(array $config);
}