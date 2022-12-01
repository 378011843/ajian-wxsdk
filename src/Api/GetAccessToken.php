<?php

namespace Ajian\Wxsdk\Api;

use GuzzleHttp\Client;

/**
 * 获取接口凭证AccessToken
 * @package Ajian\Wxsdk\Api
 */
class GetAccessToken extends BaseApi
{
    public $grant_type = "client_credential";
    private $appid;
    private $secret;

    /**
     * @return AccessToken
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/token";
        $client = new Client();
        $response = $client->request('GET', $url, [
            "query" => [
                'grant_type' => $this->grant_type,
                'appid' => $this->appid,
                'secret' => $this->secret
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetAccessToken($response);
    }

    /**
     * @param $params
     * @return mixed
     */
    function setParams($params)
    {
        if (isset($params['appid'])){
            $this->appid = $params['appid'];
        }
        if (isset($params['secret'])){
            $this->secret = $params['secret'];
        }
    }
}