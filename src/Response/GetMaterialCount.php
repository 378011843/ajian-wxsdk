<?php


namespace Ajian\Wxsdk\Response;


class GetMaterialCount extends Response
{
    public $voice_count;
    public $video_count;
    public $image_count;
    public $news_count;

    /**
     * @param $data
     * @return mixed
     */
    public function init($data)
    {
        if (isset($data['voice_count'])){
            $this->voice_count = $data['voice_count'];
        }
        if (isset($data['video_count'])){
            $this->video_count = $data['video_count'];
        }
        if (isset($data['image_count'])){
            $this->image_count = $data['image_count'];
        }
        if (isset($data['news_count'])){
            $this->news_count = $data['news_count'];
        }
    }
}