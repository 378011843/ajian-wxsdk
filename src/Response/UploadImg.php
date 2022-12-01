<?php


namespace Ajian\Wxsdk\Response;


class UploadImg extends Response
{
    public $url;
    public function init($data)
    {
        if (isset($data['url'])){
            $this->url = $data['url'];
        }
    }
}