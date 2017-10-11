<?php

namespace Claroline\API\Request;

class Request
{
    private $url;
    private $method;
    private $host;
    private $queryString;
    private $body;

    public function __construct(
        $url,
        $method      = 'GET',
        $host        = 'localhost',
        $queryString = [],
        $body        = null
    ) {
        $this->url         = $url;
        $this->method      = $method;
        $this->host        = $host;
        $this->queryString = $queryString;
        $this->body        = $body;
    }

    public function send()
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL            => $this->host . '/' . $this->url.'?'.http_build_query($this->queryString),
            CURLOPT_CUSTOMREQUEST  => $this->method,
            CURLOPT_POSTFIELDS     => $this->body
        ];

        $ch = curl_init();

        foreach ($options as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        $data = curl_exec($ch);
        $response = new Response($data, curl_getinfo($ch, CURLINFO_HTTP_CODE));
        curl_close($ch);

        return $response;
    }
}
