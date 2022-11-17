<?php

namespace Application\Bootstrap;

use Application\Core\Route;

require 'core/route.php';

$route = new Route();
$route->start();
