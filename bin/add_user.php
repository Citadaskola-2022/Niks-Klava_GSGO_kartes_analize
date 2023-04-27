<?php

require __DIR__ . '/../bootstrap/app.php';

$user = new \App\User();
$user->username = 'niks.klava';
$user->email = 'niks.klava@gmail.com';
$user->password = password_hash('password', PASSWORD_BCRYPT);

$user->save();