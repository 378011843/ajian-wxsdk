<?php


namespace Ajian\Wxsdk\Response;


class GetTicket extends Response
{

    private $ticket;
    private $expires_in;

    public function init($data)
    {
        if ($data['ticket']){
            $this->ticket = $data['ticket'];
        }
        if ($data['expires_in']){
            $this->expires_in = $data['expires_in'];
        }
    }

    public function getTicket(){
        return $this->ticket;
    }

    public function getExpiresIn(){
        return $this->expires_in;
    }
}