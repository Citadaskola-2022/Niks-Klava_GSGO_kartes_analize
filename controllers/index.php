<?php

use Rakit\Validation\Validator;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validation = $validator->make($_POST, [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);

    if ($validation->fails()) {
        throw new Exception('Form invalid');
    }

    if (!$id = \App\User::verify('niks.klava@gmail.com', 'password')) {
        throw new Exception('Incorrect login');
    }

    $user = \App\User::get($id);

    $_SESSION['id'] = $id;
    $_SESSION['username'] = $user->username;

    redirect('/my-stats');
}

view('index.view.php');