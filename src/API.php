<?php

namespace Claroline\API;

use Claroline\API\Group;
use Claroline\API\User;

class API
{
    public function __construct($host, array $options = [])
    {
        $this->host = $host;
        $this->options = $options;
        $this->routing = require('./routing.php');
        $this->utilities = new Utilities();
        $this->managers = $this->utilities->instantiateDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'Model');
    }

    public function getApiManager($object)
    {
        return $this->managers[$object];
    }
}
