<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 获取素材列表
 * @package Ajian\Wxsdk\Api
 */
class BatchGetMaterial extends BaseApi
{
    private $access_token;
    #图片（image）、视频（video）、语音 （voice）、图文（news）
    public $type;
    public $offset = 0;
    public $count = 20;

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
        if (isset($params['offset'])){
            $this->offset = $params['offset'];
        }
        if (isset($params['count'])){
            $this->count = $params['count'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('GET',$url,[
            'query' => [
                'access_token' => $this->access_token,
            ],
            'json' => [
                'type' => $this->type,
                'offset' => $this->offset,
                'count' => $this->count
            ]
        ]);
    }
}