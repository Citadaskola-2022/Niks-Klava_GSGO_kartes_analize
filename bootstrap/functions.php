<?php

function basePath(string $path): string
{
    return ROOT . $path;
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);

    require basePath('/views/' . $path);
}

function abort(int $code = 404): void
{
    http_response_code($code);
    echo "Sorry, page not found.";
    die();
}

function redirect(string $path = '/'): void
{
    header('Location: ' . $path);
    exit();
}

function flash(string $key, string $message): void
{
    $_SESSION['flash'][$key] = $message;
}

function getFlash($key): string
{
    $msg = $_SESSION['flash'][$key] ?? '';
    unset($_SESSION['flash'][$key]);

    return $msg;
}
