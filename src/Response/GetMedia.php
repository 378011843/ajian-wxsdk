<?php


namespace Ajian\Wxsdk\Response;


class GetMedia extends Response
{
    public $video_url;

    /**
     * @param $data
     * @return mixed
     */
    public function init($data)
    {
        if (isset($data['video_url'])){
            $this->video_url = $data['video_url'];
        }
    }
}