<?php


namespace Ajian\Wxsdk\Api;

/**
 * 获取网页授权回调链接地址
 * @package Ajian\Wxsdk\Api
 */
class GetOAuth2AuthorizeUrl extends BaseApi
{
    private $appid;
    public $redirect_uri;
    public $response_type = 'code';
    /**
     * snsapi_base （不弹出授权页面），snsapi_userinfo （弹出授权页面)
     */
    public $scope;
    /**
     * 重定向后会带上state参数，开发者可以填写a-zA-Z0-9的参数值，最多128字节
     */
    public $state = 'state';
    public $wechat_redirect = '#wechat_redirect';
    /**
     * 强制此次授权需要用户弹窗确认；默认为false；需要注意的是，若用户命中了特殊场景下的静默授权逻辑，则此参数不生效
     */
    public $forcePopup = false;

    public function setParams($params)
    {
        if (count($params)){
            foreach ($params as $key => $param){
                $this->$key = $param;
            }
        }
    }

    public function request()
    {
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize";
        $query = http_build_query([
            'appid' => $this->appid,
            'redirect_uri' => $this->redirect_uri,
            'response_type' => $this->response_type,
            'scope' => $this->scope,
            'state' => $this->state,
            'forcePopup' => $this->forcePopup
        ]);
        return $url.'?'.$query.$this->wechat_redirect;
    }
}