<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\API\Request\Entity;

use Claroline\API\Request\AbstractQuery;
use Claroline\API\Request\Model\HasOrganization;

class Workspace extends AbstractQuery
{
    use HasOrganization;

    public function properties()
    {
        return [
          'id' => 'integer',
          'code' => 'string',
          'name' => 'string'
        ];
    }
}
