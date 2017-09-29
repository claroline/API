<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\API\Request;

interface EntityInterface
{
    //currently a php array but it should be replaced by the json-schema later.
    public function model();

    public function get($page, $limit, array $filters = []);
    public function create(...$args);
    public function delete($id);
    public function edit(...$args);
}
