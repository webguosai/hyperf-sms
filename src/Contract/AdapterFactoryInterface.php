<?php

namespace Webguosai\HyperfSms\Contract;

interface AdapterFactoryInterface
{
    public function make(array $options);
}