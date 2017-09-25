<?php

use Claroline\API;

$api = new API('localhost/claroline');
$userAPI = $api->get('user');
$userAPI->create(...);
$userAPI->delete(...);
