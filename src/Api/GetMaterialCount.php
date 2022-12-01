<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取素材总数
 * @package Ajian\Wxsdk\Api
 */
class GetMaterialCount extends BaseApi
{
    private $access_token;

    /**
     * @inheritDoc
     */
    function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'access_token' => $this->access_token
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetMaterialCount($response);
    }
}