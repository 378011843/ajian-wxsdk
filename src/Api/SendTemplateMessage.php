<?php


namespace Ajian\Wxsdk\Api;


use GuzzleHttp\Client;

/**
 * 发送订阅消息
 * @package Ajian\Wxsdk\Api
 */
class SendTemplateMessage extends BaseApi
{
    private $access_token;
    #接收者（用户）的 openid
    private $touser;
    #所需下发的订阅模板id
    private $template_id;
    #跳转网页时填写
    public $page;
    #跳转小程序时填写，格式如{ "appid": "pagepath": { "value": any } }
    private $miniprogram;
    #模板内容，格式形如 { "key1": { "value": any }, "key2": { "value": any } }
    public $data;

    /**
     * @inheritDoc
     */
    function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['touser'])){
            $this->touser = $params['touser'];
        }
        if (isset($params['template_id'])){
            $this->template_id = $params['template_id'];
        }
        if (isset($params['page'])){
            $this->page = $params['page'];
        }
        if (isset($params['miniprogram'])){
            $this->miniprogram = $params['miniprogram'];
        }
        if (isset($params['data'])){
            $this->data = $params['data'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/message/subscribe/bizsend?access_token=ACCESS_TOKEN";
        $client = new Client();
        $response = $client->request('POST',$url,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'body' => json_encode([
                'touser' => $this->touser,
                'template_id' => $this->template_id,
                'page' => $this->page,
                'miniprogram' => $this->miniprogram,
                'data' => $this->data
            ],JSON_UNESCAPED_UNICODE)
        ]);
        return new \Ajian\Wxsdk\Response\SendTemplateMessage($response);
    }
}