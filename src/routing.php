<?php

return [
  'user' => [
    'create' => ['api/users.json', 'POST'],
    'edit' => ['api/users/{user}.json', 'PUT'],
    'delete' => ['api/users/{user}.json', 'DELETE'] ,
    'addRoles' => ['/api/users/{user}/roles/{role}/add.json', 'PATCH'],
    'removeRoles' => ['/api/users/{user}/roles/{role}/remove.json', 'GET'],
    'get' => ['api/user/{search}/get.json', 'GET']
  ],
  'group' => [
    'create' => [],
    'edit' => [],
    'delete' => [],
    'addRoles' => [],
    'removeRoles' => [],
    'get' => []
  ]
];
