<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取网页授权凭证OAuth2AccessToken
 * @package Ajian\Wxsdk\Api
 */
class GetOAuth2AccessToken extends BaseApi
{
    private $appid;
    private $secret;
    private $code;
    private $grant_type = 'authorization_code';

    /**
     * 设置参数
     * @param $params
     */
    public function setParams($params){
        if (count($params)){
            foreach ($params as $key => $param){
                $this->$key = $param;
            }
        }
    }

    public function request()
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token";
        $client = new Client();
        $response = $client->request('GET',$url,[
           'query' => [
               'appid' => $this->appid,
               'secret' => $this->secret,
               'code' => $this->code,
               'grant_type' => $this->grant_type
           ]
        ]);
        return new \Ajian\Wxsdk\Response\GetOauth2AccessToken($response);
    }
}