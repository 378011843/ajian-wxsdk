<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取永久素材
 * @package Ajian\Wxsdk\Api
 */
class GetMaterial extends BaseApi
{
    private $access_token;
    private $media_id;

    /**
     * @inheritDoc
     */
    function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['media_id'])){
            $this->media_id = $params['media_id'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('POST',$url,[
            'query' => ['access_token'=>$this->access_token],
            'json' => [
                'media_id' => $this->media_id
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetMaterial($response);
    }
}