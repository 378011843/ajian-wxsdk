<?php


namespace Ajian\Wxsdk\Api;


use Ajian\Wxsdk\Response\Response;

abstract class BaseApi
{
    /**
     * 设置参数
     * @param $params
     */
    abstract function setParams($params);

    /**
     * 获取所有参数
     * @return array
     */
    public function getParams(){
        return json_decode(json_encode($this),true);
    }

    /**
     * 发送请求
     */
    abstract public function request();
}