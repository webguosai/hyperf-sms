<?php

namespace Webguosai\HyperfSms\Adapter;

use Webguosai\HyperfSms\Contract\AdapterFactoryInterface;
use Webguosai\HyperfSms\Driver\Chinese;

class ChineseAdapterFactory implements AdapterFactoryInterface
{
    public function make(array $config)
    {
        return new Chinese($config);
    }
}