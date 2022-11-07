<?php

namespace Bootstrap;

use MainRoute\Route;

include 'dev.php';

require 'core/route.php';

$route = new Route();
$route->start();
