<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 发送客服消息
 * @package Ajian\Wxsdk\Api
 */
class SendCustomMessage extends BaseApi
{
    private $access_token;
    /**
     * 接收人openid
     */
    private $touser;
    /**
     * 消息类型
     */
    public $msgtype;
    /**
     * 发送文本消息
     */
    public $text = [
        'content' => ''
    ];
    /**
     * 发送图片消息
     */
    public $image = [
        'media_id' => ''
    ];
    /**
     * 发送语音消息
     */
    public $voice = [
        'media_id' => ''
    ];
    /**
     * 发送视频消息
     */
    public $video = [
        'media_id' => '',
        'thumb_media_id' => '',
        'title' => '',
        'description' => ''
    ];
    /**
     * 发送音乐消息
     */
    public $music = [
        'title' => '',
        'description' => '',
        'musicurl' => '',
        'hqmusicurl' => '',
        'thumb_media_id' => ''
    ];
    /**
     * 发送图文消息
     */
    public $news = [
        'articles' => [
            'title' => '',
            'description' => '',
            'url' => '',
            'picurl' => ''
        ]
    ];
    /**
     * 发送图文消息 - 编辑好的
     */
    public $mpnews = [
        'media_id' => ''
    ];
    /**
     * 发送卡券
     */
    public $wxcard = [
        'card_id' => '',
    ];
    /**
     * 发送小程序
     */
    public $miniprogrampage = [
        'title' => '',
        'appid' => '',
        'pagepath' => '',
        'thumb_media_id' => ''
    ];
    /**
     * 设置客服账号发送
     */
    public $customservice = [
        'kf_account' => ''
    ];

    public function setParams($params)
    {
        if (count($params)) {
            foreach ($params as $key => $param) {
                $this->$key = $param;
            }
        }
    }

    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send";
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => [
                'access_token' => $this->access_token,
            ],
            'body' => $this->generateRequestData(),
        ]);
        return new \Ajian\Wxsdk\Response\SendCustomMessage($response);
    }

    private function generateRequestData()
    {
        $data = [
            'touser' => $this->touser,
            'msgtype' => $this->msgtype,
        ];
        $msgtype = $this->msgtype;
        $data[$this->msgtype] = $this->$msgtype;
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}