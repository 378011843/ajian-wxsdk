<?php


namespace Ajian\Wxsdk\Response;


class AddMaterial extends Response
{
    public $media_id;
    public $url;

    /**
     * @param $data
     * @return mixed
     */
    public function init($data)
    {
        if (isset($data['media_id'])) {
            $this->media_id = $data['media_id'];
        }
        if (isset($data['url'])) {
            $this->url = $data['url'];
        }
    }
}