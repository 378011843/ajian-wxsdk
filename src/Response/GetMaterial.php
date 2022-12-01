<?php


namespace Ajian\Wxsdk\Response;


class GetMaterial extends Response
{
    public $news_item;
    public $title;
    public $description;
    public $down_url;

    /**
     * @param $data
     * @return mixed
     */
    public function init($data)
    {
        if (isset($data['news_item'])){
            $this->news_item = $data['news_item'];
        }
        if (isset($data['title'])){
            $this->title = $data['title'];
        }
        if (isset($data['description'])){
            $this->description = $data['description'];
        }
        if (isset($data['down_url'])){
            $this->down_url = $data['down_url'];
        }
    }
}