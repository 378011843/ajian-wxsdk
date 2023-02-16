<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取JSSDK权限签名所需参数jsapi_ticket
 * @package Ajian\Wxsdk\Api
 */
class GetTicket extends BaseApi
{
    private $access_token;
    private $type = 'jsapi';

    /**
     * @inheritDoc
     */
    function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['type'])){
            $this->type = $params['type'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=ACCESS_TOKEN&type=jsapi";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'access_token' => $this->access_token,
                'type' => $this->type
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetTicket($response);
    }
}