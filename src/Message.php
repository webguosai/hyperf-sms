<?php

namespace Webguosai\HyperfSms;

use Webguosai\HyperfSms\Contract\MessageInterface;
use Webguosai\HyperfSms\Contract\SmsInterface;

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
     * @param SmsInterface $sms
     * @return string
     */
    public function getTemplate(SmsInterface $sms): string
    {
        return is_callable($this->template) ? call_user_func($this->template, $sms->getName()) : $this->template;
    }

    /**
     * 返回消息内容
     * @param SmsInterface $sms
     * @return string
     */
    public function getContent(SmsInterface $sms): string
    {
        return is_callable($this->content) ? call_user_func($this->content, $sms->getName()) : $this->content;
    }

    /**
     * 返回消息的模板数据
     * @param SmsInterface $sms
     * @return array
     */
    public function getData(SmsInterface $sms): array
    {
        return is_callable($this->data) ? call_user_func($this->data, $sms->getName()) : $this->data;
    }
}