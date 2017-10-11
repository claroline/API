<?php

namespace Claroline\API\Request;

class Response
{
    private $body;
    private $httpCode;

    public function __construct($body, $httpCode = 200)
    {
        $this->body = $body;
        $this->httpCode = $httpCode;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }
}
