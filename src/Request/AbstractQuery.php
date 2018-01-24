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
    protected $host;
    protected $apiPrefix;
    protected $endPoint;

    public function __construct($host, $apiPrefix = 'apiv2')
    {
        $this->host      = $host;
        $this->apiPrefix = $apiPrefix;
        $this->endPoint  = $this->apiPrefix."/{$this->getNormalizedName()}";
    }

    public function get(array $filters = [])
    {
        $queryString = ['filters' => $filters];
        $request = new Request($this->endPoint . '/find', 'GET', $this->host, $queryString);

        return $request->send();
    }

    public function schema()
    {
        $request = new Request($this->endPoint . '/schema', 'GET', $this->host, []);

        return $request->send();
    }

    public function list($page, $limit, array $filters = [])
    {
        $queryString = [
          'page' => $page,
          'limit' => $limit,
          'filters' => $filters
        ];

        $request = new Request($this->endPoint, 'GET', $this->host, $queryString);

        return $request->send();
    }

    public function create($data)
    {
        $request = new Request($this->endPoint, 'POST', $this->host, [], json_encode($data));

        return $request->send();
    }

    public function update($data)
    {
        $request = new Request($this->endPoint.'/'.$data->id, 'PUT', $this->host, [], json_encode($data));

        return $request->send();
    }

    public function delete($data)
    {
        $request = new Request($this->endPoint, 'DELETE', $this->host, ['ids' => [$data->id]]);

        return $request->send();
    }

    public function optional()
    {
        return [];
    }

    public function getNormalizedName()
    {
        return substr(strtolower(get_class($this)), strrpos(strtolower(get_class($this)), '\\') + 1);
    }
}
