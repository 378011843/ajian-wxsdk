<?php


namespace Ajian\Wxsdk\Response;

use Psr\Http\Message\ResponseInterface;

abstract class Response
{
    public $iserror = false;
    public $errcode;
    public $errmsg;
    public $rawResponse = null;

    abstract public function init($data);

    public function __construct(ResponseInterface $response = null)
    {
        if (isset($response)){
            $this->setResponseData($response);
        }
    }

    public function setResponseData(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 200){
            $content = $response->getBody()->getContents();
            try {
                $data = json_decode($content,true);
                if (isset($data['errcode'])){
                    $this->errcode = $data['errcode'];
                    $this->errmsg = $data['errmsg'];
                }
                if (isset($data['errcode']) && $data['errcode'] != 0){
                    $this->iserror = true;
                }
                else{
                    $this->init($data);
                }
                $this->rawResponse = $content;
            }
            catch (\Exception $e){
                throw new \Exception($e->getMessage());
            }
        }
        else{
            throw new \Exception('api request error');
        }
    }
}