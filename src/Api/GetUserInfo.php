<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取用户信息unionid
 * @package Ajian\Wxsdk\Api
 */
class GetUserInfo extends BaseApi
{
    private $access_token;
    private $openid;
    /**
     * @var string zh_CN 简体，zh_TW 繁体，en 英语
     */
    public $lang = 'zh_CN';

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['openid'])){
            $this->openid = $params['openid'];
        }
    }

    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN";
        $client = new Client();
        $response = $client->request('GET', $url, [
            'query' => [
                'access_token' => $this->access_token,
                'openid' => $this->openid,
                'lang' => $this->lang
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetUserInfo($response);
    }
}