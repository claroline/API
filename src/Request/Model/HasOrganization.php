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

trait HasOrganization
{
    public function addOrganization($objectId, $groupId)
    {
        $request = new Request($this->endPoint.$objectId.'/organization/add?ids[]='.$groupId, 'PATCH', $this->host);

        return $request->send();
    }

    public function removeOrganization($objectId, $groupId)
    {
        $request = new Request($this->endPoint.$objectId.'/organization/remove?ids[]='.$groupId, 'PATCH', $this->host);

        return $request->send();
    }
}
