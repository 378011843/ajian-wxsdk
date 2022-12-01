<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 生成带参数的二维码
 * @package Ajian\Wxsdk\Api
 */
class CreateQrcode extends BaseApi
{
    const QR_SCENE = 'QR_SCENE';
    const QR_STR_SCENE = 'QR_STR_SCENE';
    const QR_LIMIT_SCENE = 'QR_LIMIT_SCENE';
    const QR_LIMIT_STR_SCENE = 'QR_LIMIT_STR_SCENE';

    public $expire_seconds;
    public $action_name;
    public $action_info;
    public $scene_id;
    public $scene_str;
    private $access_token;

    public function setParams($params)
    {
        if (count($params)) {
            foreach ($params as $key => $param) {
                $this->$key = $param;
            }
        }
    }

    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create";
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => [
                'access_token' => $this->access_token,
            ],
            'body' => $this->generateRequestData()
        ]);
        return new \Ajian\Wxsdk\Response\CreateQrcode($response);
    }

    private function generateRequestData()
    {
        switch ($this->action_name) {
            case 'QR_SCENE':
                return json_encode([
                    'expire_seconds' => $this->expire_seconds,
                    'action_name' => $this->action_name,
                    'action_info' => [
                        'scene' => [
                            'scene_id' => $this->scene_id
                        ]
                    ]
                ], JSON_UNESCAPED_UNICODE);
            case 'QR_STR_SCENE':
                return json_encode([
                    'expire_seconds' => $this->expire_seconds,
                    'action_name' => $this->action_name,
                    'action_info' => [
                        'scene' => [
                            'scene_str' => $this->scene_id
                        ]
                    ]
                ], JSON_UNESCAPED_UNICODE);
            case 'QR_LIMIT_SCENE':
                return json_encode([
                    'action_name' => $this->action_name,
                    'action_info' => [
                        'scene' => [
                            'scene_id' => $this->scene_id
                        ]
                    ]
                ], JSON_UNESCAPED_UNICODE);
            case 'QR_LIMIT_STR_SCENE':
                return json_encode([
                    'action_name' => $this->action_name,
                    'action_info' => [
                        'scene' => [
                            'scene_str' => $this->scene_id
                        ]
                    ]
                ], JSON_UNESCAPED_UNICODE);
        }
    }
}