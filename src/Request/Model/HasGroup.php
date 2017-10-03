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

trait HasGroup
{
    public function addGroup($objectId, $groupId)
    {
        $request = new Request($this->endPoint.$objectId.'/group/add', 'PATCH', $this->host, ['ids' => [$groupId]]);

        return $request->send();
    }

    public function removeGroup($objectId, $groupId)
    {
        $request = new Request($this->endPoint.$objectId.'/group/remove', 'PATCH', $this->host, ['ids' => [$groupId]]);

        return $request->send();
    }
}
