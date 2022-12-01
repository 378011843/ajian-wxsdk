<?php
namespace Ajian\Wxsdk\Response;


class GetAccessToken extends Response
{
    private $access_token;
    private $expires_in;

    public function init($data){
        $this->access_token = $data['access_token'];
        $this->expires_in = $data['expires_in'];
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function getExpiresIn(){
        return $this->expires_in;
    }
}