<?php

namespace Claroline\API;

use Claroline\API\Request\Request;

class API
{
    public function __construct($host, array $options = [])
    {
        $this->host = $host;
        $this->options = $options;
        //$this->routing = require(__DIR__.'/../config/routing.php');
        $this->routing = [];
        $this->utilities = new Utilities();
        $this->managers = $this->utilities->instantiateDirectory(
          __DIR__ . '/Request/Entity',
          [$this->host]
        );
    }

    public function getManager($object)
    {
        return $this->managers[$object];
    }
}
