<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\API\Entity;

use Claroline\API\Request\AbstractQuery;

class Group extends AbstractQuery
{
    public function required()
    {
        return ['name'];
    }
}
