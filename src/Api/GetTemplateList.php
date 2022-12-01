<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取订阅消息私有模板列表
 * @package Ajian\Wxsdk\Api
 */
class GetTemplateList extends BaseApi
{
    private $access_token;

    public function request($access_token = null)
    {
        $url = "https://api.weixin.qq.com/wxaapi/newtmpl/gettemplate?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'access_token' => $access_token ? $access_token : $this->access_token
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetTemplateList($response);
    }

    /**
     * @param $params
     * @return mixed
     */
    function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
    }
}