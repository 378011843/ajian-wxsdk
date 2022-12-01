<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取网页授权用户信息
 * @package Ajian\Wxsdk\Api
 */
class GetOAuth2UserInfo extends BaseApi
{
    private $access_token;
    private $openid;
    /**
     * @var string zh_CN 简体，zh_TW 繁体，en 英语
     */
    public $lang = 'zh_CN';

    /**
     * 设置参数
     * @param $params
     */
    public function setParams($params){
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['openid'])){
            $this->openid = $params['openid'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/sns/userinfo";
        $client = new Client();
        $response = $client->request('GET', $url, [
            'query' => [
                'access_token' => $this->access_token,
                'openid' => $this->openid,
                'lang' => $this->lang
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetOAuth2UserInfo($response);
    }
}