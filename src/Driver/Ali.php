<?php

declare(strict_types=1);

namespace Webguosai\HyperfSms\Driver;

use Exception;
use Webguosai\HyperfSms\Contract\MessageInterface;
use Webguosai\HyperfSms\Contract\SmsInterface;

class Ali implements SmsInterface
{
    public function __construct(protected array $config)
    {
    }

    /**
     * 发送短信
     * @param string $mobile
     * @param MessageInterface $message
     * @return void
     * @throws Exception
     */
    public function send(string $mobile, MessageInterface $message): void
    {
        $params = [
            'Format'           => 'JSON',
            'Version'          => '2017-05-25',
            'SignatureMethod'  => 'HMAC-SHA1',
            'SignatureNonce'   => uniqid((string)mt_rand(0, 65535), true),
            'SignatureVersion' => '1.0',
            'AccessKeyId'      => $this->config['accessKeyId'],
            'Timestamp'        => gmdate('Y-m-d\TH:i:s\Z'),
            'Action'           => 'SendSms',
            'RegionId'         => $this->config['regionId'],
            'PhoneNumbers'     => $mobile,
            'SignName'         => $this->config['signName'],
            'TemplateCode'     => $message->getTemplate(),
            'TemplateParam'    => json_encode($message->getData())
        ];

        // 对参数进行排序
        ksort($params);

        // 构建待签名字符串
        $stringToSign = 'GET&%2F&' . urlencode(http_build_query($params, '', '&', PHP_QUERY_RFC3986));

        // 生成签名
        $signature = base64_encode(hash_hmac('sha1', $stringToSign, $this->config['accessKeySecret'] . '&', true));

        // 将签名添加到请求参数中
        $params['Signature'] = $signature;

        // 构建请求 URL
        $url      = 'https://dysmsapi.aliyuncs.com/?' . http_build_query($params);
        $response = (new \Webguosai\HttpClient(['timeout' => 5]))->get($url);

        if ($response->ok()) {
            $json = $response->json();
            if ($json['Code'] === 'OK') {
                return;
            } else {
                // 错误码 @see: https://api.aliyun.com/document/Dysmsapi/2017-05-25/errorCode
                throw new Exception($json['Message'] . ' [' . $json['Code'] . ']');
            }
        }

        throw new Exception($response->getErrorMsg());
    }
}
