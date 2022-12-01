<?php


namespace Ajian\Wxsdk\Response;


class GetOauth2AccessToken extends Response
{
    private $access_token;
    private $expires_in;
    private $refresh_token;
    private $openid;
    public $scope;
    public $is_snapshotuser;

    public function init($data)
    {
        if (count($data)){
            foreach ($data as $key => $item){
                $this->$key = $item;
            }
        }
    }

    public function GetAccessToken(){
        return $this->access_token;
    }

    public function GetExpiresIn(){
        return $this->expires_in;
    }

    public function GetRefreshToken(){
        return $this->refresh_token;
    }

    public function GetOpenid(){
        return $this->openid;
    }
}