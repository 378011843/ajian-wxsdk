<?php


namespace Ajian\Wxsdk\Response;


class GetTemplateList extends Response
{
    public $data;
    /**
     * @param $data
     * @return mixed
     */
    public function init($data)
    {
        if (isset($data['data'])){
            $this->data = $data['data'];
        }
    }
}