<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 查询菜单
 * @package Ajian\Wxsdk\Api
 */
class GetMenu extends BaseApi
{
    private $access_token;

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
    }

    public function request($access_token=null)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'access_token' => $access_token ? $access_token : $this->access_token,
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetMenu($response);
    }
}