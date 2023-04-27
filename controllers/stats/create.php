<?php

use Rakit\Validation\Validator;

$db = new SQLite3(ROOT . '/db/project.sqlite3');

if (!\App\User::currentUser()) {
    redirect();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validation = $validator->make($_POST, [
        'map' => 'required',
        'kills' => 'required|numeric|min:0',
        'mvp' => 'nullable',
        'rounds_won' => 'required|numeric|min:0',
        'rounds_lost' => 'required|numeric|min:0',
        'ct_won' => 'required|numeric|min:0',
        'ct_lost' => 'required|numeric|min:0',
        't_won' => 'required|numeric|min:0',
        't_lost' => 'required|numeric|min:0',
    ]);

    if ($validation->fails()) {
        $errors = $validation->errors();
        throw new Exception('Form was incorrect');
    } else {
        $stats = new App\Stats();

        $stats->map = $_POST['map'];
        $stats->kills = $_POST['kills'];
        $stats->deaths = $_POST['deaths'];
        $stats->mvp = $_POST['mvp'];
        $stats->rounds_won = $_POST['rounds_won'];
        $stats->rounds_lost = $_POST['rounds_lost'];
        $stats->ct_won = $_POST['ct_won'];
        $stats->ct_lost = $_POST['ct_lost'];
        $stats->t_won = $_POST['t_won'];
        $stats->t_lost = $_POST['t_lost'];
        $stats->user_id = \App\User::currentUser()->id;

        $stats->save();

        flash('save_form', 'Success!');

        redirect('/form');
    }
}

view('stats/create.php');