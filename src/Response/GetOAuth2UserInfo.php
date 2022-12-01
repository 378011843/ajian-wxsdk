<?php


namespace Ajian\Wxsdk\Response;


class GetOAuth2UserInfo extends Response
{
    public $openid;
    public $nickname;
    public $sex;
    public $province;
    public $city;
    public $country;
    public $headimgurl;
    public $privilege;
    public $unionid;

    public function init($data)
    {
        if(count($data)){
            foreach ($data as $key => $datum) {
                $this->$key = $datum;
            }
        }
    }
}