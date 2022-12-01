<?php
include 'vendor/autoload.php';

ini_set('display_errors', 'On');
error_reporting(-1);

use Ajian\Wxsdk\Api\GetAccessToken;
$appid = "wx46896dcbb996a952";
$secret = "5e7aea8adb36652d0483331209c2c763";
$acc = new GetAccessToken();
$acc->setParams([
    'appid' => 'wx46896dcbb996a952',
    'secret' => '5e7aea8adb36652d0483331209c2c763'
]);
$response = $acc->request();
print_r($response);
$access_token = "63_Lz4G6CHv7ERAfoUtz6edrYvCDpcAGtsXzZ2APiahZOYOBP5I-ebXwETLfeCyOi3aCBgh014z_PczI3HvF97O0EZuAV1D6HzdGEFZr60gS2qGzY42z4tsPlOlvOUNFLhABAUMS";
$touser = "oX8iJ1m0COoM18JHeV1wRfwo9G_4";

//发送客服消息
/*$acc = new \Ajian\Wxsdk\Api\SendCustomMessage();
$acc->setParams([
    'access_token' => $access_token,
    'touser' => 'oX8iJ1m0COoM18JHeV1wRfwo9G_4',
    'msgtype' => 'text',
    'text' => [
        'content' => '测试，你好'
    ]
]);
$response = $acc->request();
var_dump($response);*/


//创建菜单
/*$acc = new \ajian\wxsdk\Api\CreateMenu();
$acc->setParams([
    'access_token' => $access_token,
    'menu_data' => [
        'button' => [
            "type" => "click",
            "name" => "今日歌曲",
            "key" => "测试客服消息"
        ]
    ]
]);
print_r($acc);
$response = $acc->request();
var_dump($response);*/

//删除菜单
/*$acc = new \ajian\wxsdk\Api\DeleteMenu();
$response = $acc->request($access_token);
print_r($response);*/

//查询菜单
/*$acc = new \ajian\wxsdk\Api\GetMenu();
$acc->setParams([
    'access_token' => $access_token
]);
$response = $acc->request();
print_r($response);*/

//获取用户信息unionid
/*$acc = new \Ajian\Wxsdk\Api\GetUserInfo();
$acc->setParams([
    'access_token' => $access_token,
    'openid' => $touser
]);
$response = $acc->request();
print_r($response);*/

//获取网页授权链接
/*$acc = new \Ajian\Wxsdk\Api\GetOAuth2AuthorizeUrl();
$acc->setParams([
    'appid' => 'wx46896dcbb996a952',
    'redirect_uri' => "http://lettery.xiser.cn/authorize.php",
    'scope' => 'snsapi_userinfo',
]);
print_r($acc->request());*/

//获取网页授权access_token
/*$acc = new \Ajian\Wxsdk\Api\GetOAuth2AccessToken();
$acc->setParams([
    'appid' => $appid,
    'secret' => $secret,
    'code' => "061WW11w3moFBZ2Gbb0w3fkAD62WW115",
]);
$access = $acc->request();

//获取网页授权用户信息
$userinfo = new \Ajian\Wxsdk\Api\GetOAuth2UserInfo();
$userinfo->setParams([
    'access_token' => $access->GetAccessToken(),
    'openid' => $access->GetOpenid()
]);
$res = $userinfo->request();
print_r($res);*/

//获取带参数二维码
/*$acc = new \Ajian\Wxsdk\Api\CreateQrcode();
$acc->setParams([
    'access_token' => $access_token,
    'expire_seconds' => '6200',
    'action_name' => 'QR_SCENE',
    'scene_id' => 123
]);
$response = $acc->request();
file_put_contents('qrcode.jpg',$response->GetQrcodeByTicket());*/

//获取订阅模板列表
/*$acc = new \Ajian\Wxsdk\Api\GetTemplateList();
$response = $acc->request($access_token);
print_r($response);*/

//传图文消息内的图片获取URL
/*$file = "qrcode.jpg";
$acc = new \Ajian\Wxsdk\Api\UploadImg();
$acc->setParams([
    'access_token' => $access_token,
    'media' => $file,
    'file_name' => $file
]);
var_dump($acc->request());*/

/*$file = "qrcode.jpg";
$acc = new \Ajian\Wxsdk\Api\AddMaterial();
$acc->setParams([
    'access_token' => $access_token,
    'type' => 'image',
    'media' => $file,
    'file_name' => $file,
]);
var_dump($acc->request());*/

/*$acc = new \Ajian\Wxsdk\Api\GetMaterial();
$acc->setParams([
    'access_token' => $access_token,
    'media_id' => "nOqDdxibWD7vrbvBn9YB2g9_FjU__8-xzs2XOfmlBRQorqJpYMKA0aP4Zvp1ZMH7"
]);
var_dump($acc->request());*/

/*$acc = new \Ajian\Wxsdk\Api\DelMaterial();
$acc->setParams([
    'access_token' => $access_token,
    'media_id' => "nOqDdxibWD7vrbvBn9YB2g9_FjU__8-xzs2XOfmlBRQorqJpYMKA0aP4Zvp1ZMH7"
]);
var_dump($acc->request());*/

/*$file = "qrcode.jpg";
$acc = new \Ajian\Wxsdk\Api\UploadMedia();
$acc->setParams([
    'access_token' => $access_token,
    'type' => 'image',
    'media' => $file,
    'file_name' => $file
]);
print_r($acc->request());*/

/*$acc = new \Ajian\Wxsdk\Api\GetMedia();
$acc->setParams([
    'access_token' => $access_token,
    'media_id' => "M3hybrVrM5R0AuhRq0YhqnBS_-_-J2qPnmw7MRGGDbT-S0sijSoxVns1qh1gG8mw"
]);
print_r($acc->request()->rawResponse);*/

/*$acc = new \Ajian\Wxsdk\Api\GetMaterialCount();
$acc->setParams([
    'access_token' => $access_token,
]);
print_r($acc->request());*/

/*$acc = new \Ajian\Wxsdk\Api\BatchGetMaterial();
$acc->setParams([
    'access_token' => $access_token,
    'type' => 'image',
]);
print_r($acc->request());*/