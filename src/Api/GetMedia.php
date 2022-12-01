<?php


namespace Ajian\Wxsdk\Api;

use GuzzleHttp\Client;

/**
 * 获取临时素材
 * @package Ajian\Wxsdk\Api
 */
class GetMedia extends BaseApi
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
        $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'access_token' => $this->access_token,
                'media_id' => $this->media_id
            ]
        ]);
        return new \Ajian\Wxsdk\Response\GetMedia($response);
    }
}