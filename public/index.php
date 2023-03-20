<?php

declare(strict_types=1);

define('ROOT', dirname(__DIR__));

session_start();

require ROOT . '/bootstrap/app.php';

require ROOT . '/router.php';