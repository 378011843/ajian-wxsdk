<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 新增其他类型永久素材
 * @package Ajian\Wxsdk\Api
 */
class AddMaterial extends BaseApi
{
    private $access_token;
    #媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）
    public $type;
    public $media;
    public $file_name;
    #视频素材的标题
    public $title;
    #视频素材的描述
    public $introduction;

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
        if (isset($params['media'])){
            $this->media = $params['media'];
        }
        if (isset($params['file_name'])){
            $this->file_name = $params['file_name'];
        }
        if (isset($params['title'])){
            $this->title = $params['title'];
        }
        if (isset($params['introduction'])){
            $this->introduction = $params['introduction'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=ACCESS_TOKEN&type=TYPE";
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => [
                'access_token' => $this->access_token,
                'type' => $this->type
            ],
            'multipart' => $this->generateRequestData()
        ]);
        return new \Ajian\Wxsdk\Response\AddMaterial($response);
    }

    public function generateRequestData(){
        $data = [
            [
                'name' => 'media',
                'contents' => fopen($this->media, 'r'),
                'filename' => $this->file_name
            ],
        ];
        if ($this->type == 'video'){
            $data[] = [
                'title' => $this->title,
                'introduction' => $this->introduction
            ];
        }
        return $data;
    }
}