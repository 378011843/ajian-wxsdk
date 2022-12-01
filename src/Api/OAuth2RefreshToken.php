<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 刷新网页授权接口凭证AccessToken
 * @package Ajian\Wxsdk\Api
 */
class OAuth2RefreshToken extends BaseApi
{
    private $appid;
    public $grant_type = 'refresh_token';
    /**
     * 填写通过access_token获取到的refresh_token参数
     */
    private $refresh_token;

    public function setParams($params)
    {
        if(isset($params['appid'])){
            $this->appid = $params['appid'];
        }
        if (isset($params['refresh_token'])){
            $this->refresh_token = $params['refresh_token'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/refresh_token";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'appid' => $this->appid,
                'grant_type' => $this->grant_type,
                'refresh_token' => $this->refresh_token
            ]
        ]);
        return new \Ajian\Wxsdk\Response\OAuth2RefreshToken($response);
    }
}