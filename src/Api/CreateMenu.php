<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 创建菜单
 * @package Ajian\Wxsdk\Api
 */
class CreateMenu extends BaseApi
{
    private $access_token;
    public $menu_data;

    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create";
        $client = new Client();
        $response = $client->request('POST',$url,[
            'query' => [
                'access_token' => $this->access_token,
            ],
            'body' => json_encode($this->menu_data,JSON_UNESCAPED_UNICODE)
        ]);
        return new \Ajian\Wxsdk\Response\CreateMenu($response);
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
        if (isset($params['menu_data'])){
            $this->menu_data = $params['menu_data'];
        }
    }
}