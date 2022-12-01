<?php


namespace Ajian\Wxsdk\Response;


use GuzzleHttp\Client;

class CreateQrcode extends Response
{
    private $ticket;
    private $expire_seconds;
    private $url;

    public function init($data)
    {
        if (isset($data['ticket'])){
            $this->ticket = $data['ticket'];
        }
        if (isset($data['expire_seconds'])){
            $this->expire_seconds = $data['expire_seconds'];
        }
        if (isset($data['url'])){
            $this->url = $data['url'];
        }
    }

    public function GetQrcodeByTicket(){
        return (new Client())->request('GET','https://mp.weixin.qq.com/cgi-bin/showqrcode',[
            'query' => [
                'ticket' => $this->ticket
            ]
        ])->getBody()->getContents();
    }
}