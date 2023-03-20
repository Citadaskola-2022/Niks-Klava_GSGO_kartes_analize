<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/form' => 'controllers/stats/create.php',
    '/my-stats' => 'controllers/stats/index.php',
    '/logout' => 'controllers/user/logout.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort();
}
