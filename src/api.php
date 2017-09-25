<?php

namespace Claroline;

use Claroline\Request;
use Claroline\API\Group;
use Claroline\API\User;

class API
{
    public function __construct($host, array $options = [])
    {
        $this->host = $host;
        $this->options = $options;
        $this->routing = require('./routing.php');
        $this->managers = $this->buildManagerList();
    }

    public function getApiManager($object)
    {
        return $this->managers['object'];
    }

    private function buildManagerList()
    {
        $request = new Request();
        $managers = [];
        $managers['user'] = new User($request, $this->routing('user'));
        $manager['group'] = new Group($request, $this->routing('group'));
    }
}
