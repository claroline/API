<?php

namespace Claroline\API;

use Claroline\API\Group;
use Claroline\API\User;

class Request
{
    public function __construct(array $options)
    {
        $this->options = $options;
    }
}
