<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\API;

use Claroline\Request;

class User
{
    public function __construct(Request $request, $routes)
    {
        $this->request = $request;
        $this->routes = $routes;
    }
    
    public function get()
    {
    }

    public function create()
    {
    }

    public function delete()
    {
    }

    public function edit()
    {
    }

    public function addRoles()
    {
    }

    public function removeRoles()
    {
    }
}
