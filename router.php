<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



$routes = [
    '/' => 'controllers/index.php',
    '/dashboard/add' => 'controllers/stats/create.php',
    '/login' => 'controllers/login/create.php',
    '/logout' => 'controllers/login/destroy.php',
];

if (array_key_exists($uri, $routes)) {
    require  $routes[$uri];
} else {
    abort();
}
