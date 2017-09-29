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

abstract class AbstractQuery implements EntityInterface
{
    private $routing;

    public function __construct($routing, $host, $apiPrefix = 'apiv2')
    {
        $this->routing   = $routing;
        $this->host      = $host;
        $this->apiPrefix = $apiPrefix;
    }

    public function get($page, $limit, array $filters = [])
    {
        $url = $this->apiPrefix."/{$this->getNormalizedName()}/";
        $method = 'GET';

        $queryString = [
          'page' => $page,
          'limit' => $limit,
          'filters' => $filters
        ];

        $request = new Request($url, $method, $this->host, $queryString);

        return $request->send();
    }

    public function create(...$args)
    {
    }

    public function delete($id)
    {
    }

    public function edit(...$args)
    {
    }

    public function getNormalizedName()
    {
        return substr(strtolower(get_class($this)), strrpos(strtolower(get_class($this)), '\\') + 1);
    }
}
