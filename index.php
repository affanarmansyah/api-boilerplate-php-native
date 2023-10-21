<?php

use src\restapi\Rest;

require_once __DIR__ . '/vendor/autoload.php';

$restApi = new Rest;
$restApi->makeRoute();