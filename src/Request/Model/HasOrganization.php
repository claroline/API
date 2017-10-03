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
    public function addOrganization($objectId, $organizationId)
    {
        $request = new Request($this->endPoint.$objectId.'/organization/add', 'PATCH', $this->host, ['ids' => [$organizationId]]);

        return $request->send();
    }

    public function removeOrganization($objectId, $organizationId)
    {
        $request = new Request($this->endPoint.$objectId.'/organization/remove', 'PATCH', $this->host, ['ids' => [$organizationId]]);

        return $request->send();
    }
}
