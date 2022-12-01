<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 新增临时素材
 * @package Ajian\Wxsdk\Api
 */
class UploadMedia extends BaseApi
{
    private $access_token;
    #图片（image）、语音（voice）、视频（video）和缩略图（thumb）
    public $type;
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
        if (isset($params['type'])) {
            $this->type = $params['type'];
        }
        if (isset($params['media'])) {
            $this->media = $params['media'];
        }
        if (isset($params['file_name'])) {
            $this->file_name = $params['file_name'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE";
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => [
                'access_token' => $this->access_token,
                'type' => $this->type,
            ],
            'multipart' => [
                [
                    'name' => 'media',
                    'contents' => fopen($this->media, 'r'),
                    'filename' => $this->file_name
                ],
            ]
        ]);
        return new \Ajian\Wxsdk\Response\UploadMedia($response);
    }
}