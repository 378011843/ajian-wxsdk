<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 删除菜单
 * @package Ajian\Wxsdk\Api
 */
class DeleteMenu extends BaseApi
{
    private $access_token;

    public function request($access_token=null)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete";
        $client = new Client();
        $response = $client->request('POST',$url,[
            'query' => [
                'access_token' => $access_token ? $access_token : $this->access_token,
            ],
        ]);
        return new \Ajian\Wxsdk\Response\DeleteMenu($response);
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