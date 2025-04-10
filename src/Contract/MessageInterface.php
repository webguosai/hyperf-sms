<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Contract;

interface MessageInterface
{
    /**
     * 返回消息的模板id
     * @return string
     */
    public function getTemplate(): string;

    /**
     * 返回消息内容
     * @return string
     */
    public function getContent(): string;

    /**
     * 返回消息的模板数据
     * @return array
     */
    public function getData(): array;
}