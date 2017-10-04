<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\API\Request\Model;

use Claroline\API\Request\Request;

trait HasRole
{
    public function addRole($objectId, $roleId)
    {
        $request = new Request($this->endPoint.$objectId.'/role', 'PATCH', $this->host, ['ids' => [$roleId]]);

        return $request->send();
    }

    public function removeRole($objectId, $roleId)
    {
        $request = new Request($this->endPoint.$objectId.'/role', 'DELETE', $this->host, ['ids' => [$roleId]]);

        return $request->send();
    }
}
