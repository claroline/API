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
use Claroline\API\Request\Model\HasRole;

class Group extends AbstractQuery
{
    use HasOrganization;
    use HasRole;

    public function properties()
    {
        return [
          'id' => 'integer',
          'name' => 'string'
        ];
    }
}
