<?php


namespace Ajian\Wxsdk\Api;

use GuzzleHttp\Client;

/**
 * 上传图文消息内的图片获取URL
 * 图文消息的具体内容中，微信后台将过滤外部的图片链接
 * 图片 url 需通过"上传图文消息内的图片获取URL"接口上传图片获取
 * @package Ajian\Wxsdk\Api
 */
class UploadImg extends BaseApi
{
    private $access_token;
    public $media;
    public $file_name;

    /**
     * @inheritDoc
     */
    function setParams($params)
    {
        if (isset($params['access_token'])) {
            $this->access_token = $params['access_token'];
        }
        if (isset($params['media'])){
            $this->media = $params['media'];
        }
        if (isset($params['file_name'])){
            $this->file_name = $params['file_name'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => [
                'access_token' => $this->access_token
            ],
            'multipart' => [
                [
                    'name' => 'media',
                    'contents' => fopen($this->media, 'r'),
                    'filename' => $this->file_name
                ]
            ]
        ]);
        return new \Ajian\Wxsdk\Response\UploadImg($response);
    }
}