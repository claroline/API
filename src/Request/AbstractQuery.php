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
    private $host;
    private $apiPrefix;
    private $endPoint;

    public function __construct($routing, $host, $apiPrefix = 'apiv2')
    {
        $this->routing   = $routing;
        $this->host      = $host;
        $this->apiPrefix = $apiPrefix;
        $this->endPoint  = $this->apiPrefix."/{$this->getNormalizedName()}/";
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

    public function create(...$args)
    {
        $request = new Request($this->endPoint, 'POST', $this->host, [], json_encode($this->getObjectFromArgs($args)));

        return $request->send();
    }

    public function edit(...$args)
    {
        $request = new Request($this->endPoint, 'PUT', $this->host, [], json_encode($this->getObjectFromArgs($args)));

        return $request->send();
    }

    public function delete($id)
    {
    }

    public function optional()
    {
        return [];
    }

    public function getNormalizedName()
    {
        return substr(strtolower(get_class($this)), strrpos(strtolower(get_class($this)), '\\') + 1);
    }

    protected function getObjectFromArgs($args)
    {
        $obj = new \stdClass();

        foreach ($this->required() as $index => $prop) {
            $obj->$prop = $args[$index];
        }

        //handle optional properties here

        return $obj;
    }
}
