<?php

namespace Webguosai\HyperfSms;

use Webguosai\HyperfSms\Contract\MessageInterface;

class Message implements MessageInterface
{
    protected string $template;
    protected string $content;
    protected array $data;

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    /**
     * 返回消息的模板id
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * 返回消息内容
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
        // return is_callable($this->content) ? call_user_func($this->content, $gateway) : $this->content;
    }

    /**
     * 返回消息的模板数据
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}