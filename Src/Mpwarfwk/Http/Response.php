<?php

namespace Mpwarfwk\Http;

class Response
{

    protected $content;
    protected $status;

    public function __construct($content, $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    public function send()
    {
        if ($this->status != 200)
        {
            header("HTTP/1.0 404 Not Found");
        }

        echo $this->content;
    }
}