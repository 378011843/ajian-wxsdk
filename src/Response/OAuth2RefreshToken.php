<?php


namespace Ajian\Wxsdk\Response;


class OAuth2RefreshToken extends Response
{
    private $access_token;
    private $expires_in;
    private $refresh_token;
    private $openid;
    public $scope;

    public function init($data)
    {
        if (count($data)) {
            foreach ($data as $key => $item) {
                $this->$key = $item;
            }
        }
    }
}