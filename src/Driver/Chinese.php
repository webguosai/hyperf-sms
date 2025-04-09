<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Driver;

use Exception;
use Webguosai\HttpClient;
use Webguosai\HyperfSms\Contract\SmsInterface;

class Chinese implements SmsInterface
{
    protected array $errorCodes = [
        '-1'  => '没有该用户账户',
        '-2'  => '接口密钥不正确',
        '-21' => 'MD5接口密钥加密不正确',
        '-3'  => '短信数量不足',
        '-11' => '该用户被禁用',
        '-14' => '短信内容出现非法字符',
        '-4'  => '手机号格式不正确',
        '-41' => '手机号码为空',
        '-42' => '短信内容为空',
        '-51' => '短信签名格式不正确',
        '-52' => '短信签名太长',
        '-6'  => 'IP限制',
    ];

    public function __construct(protected array $config)
    {
    }

    /**
     * 发送短信
     * @param string $mobile
     * @param string $message
     * @param string $templateKey
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function send(string $mobile, string $message, string $templateKey = '', array $params = []): void
    {
        $url      = "https://utf8api.smschinese.cn/?Uid={$this->config['uid']}&Key={$this->config['key']}&smsMob={$mobile}&smsText=" . URLEncode($message);
        $response = (new HttpClient(['timeout' => 5]))->get($url);

        if ($response->ok()) {
            $code = $response->body;
            if ($code > 0) {
                return;
            } else {
                if (isset($this->errorCodes[$code])) {
                    $errMsg = $this->errorCodes[$code] . "[{$code}]";
                } else {
                    $errMsg = "短信接口错误[$code]";
                }
                throw new Exception($errMsg);
            }
        }
        throw new Exception($response->getErrorMsg());
    }
}
