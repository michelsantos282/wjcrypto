<?php

use App\Api\DI\Builder;
use Pecee\SimpleRouter\SimpleRouter;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/lib/Helper.php";
require_once __DIR__ . "/lib/Routes/RoutesApi.php";


session_start();

SimpleRouter::start();
