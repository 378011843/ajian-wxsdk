<?php


namespace Ajian\Wxsdk\Response;


class GetUserInfo extends Response
{
    public $subscribe;
    public $openid;
    public $language;
    public $subscribe_time;
    public $unionid;
    public $remark;
    public $groupid;
    public $tagid_list;
    public $subscribe_scene;
    public $qr_scene;
    public $qr_scene_str;

    /**
     * 2021年12月27日之后，不再输出头像、昵称信息。
     */
    public $nickname;
    public $headimgurl;
    public $sex;
    public $city;
    public $province;
    public $country;

    public function init($data)
    {
        if (count($data)){
            foreach ($data as $key => $item){
                $this->$key = $item;
            }
        }
    }
}