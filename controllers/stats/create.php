<?php

$db = new \SQLite3(ROOT . '/db/project.sqlite3');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new \Rakit\Validation\Validator();
    $validation = $validator->make($_POST, [
        'map' => 'required',
        'kills' => 'required|numeric|min:0',
        'mvp' => 'nullable',
        'rounds_win' => 'required|numeric|min:0',
        'rounds_lost' => 'required|numeric|min:0',
        'ct_win' => 'required|numeric|min:0',
        'ct_lost' => 'required|numeric|min:0',
        't_win' => 'required|numeric|min:0',
        't_lost' => 'required|numeric|min:0',
    ]);


    if ($validation->fails()) {
        // handling errors
        $errors = $validation->errors();
        echo "<pre>";
        print_r($errors->firstOfAll());
        echo "</pre>";
        exit;
    } else {

        $stmt = $db->prepare(<<<SQL
            INSERT INTO stats 
                (map, kills, deaths, mvp, rounds_win, rounds_lost, ct_win, ct_lost, t_won, t_lost) 
            VALUES 
                (:map, :kills, :deaths, :mvp, :rounds_win, :rounds_lost, :ct_win, :ct_lost, :t_won, :t_lost)
        SQL);

        $stmt->bindValue(':map', $_POST['map']);
        $stmt->bindValue(':kills', $_POST['kills']);
        $stmt->bindValue(':deaths', $_POST['deaths']);
        $stmt->bindValue(':mvp', $_POST['mvp']);
        $stmt->bindValue(':rounds_won', $_POST['rounds_won']);
        $stmt->bindValue(':rounds_lost', $_POST['rounds_lost']);
        $stmt->bindValue(':ct_won', $_POST['ct_won']);
        $stmt->bindValue(':ct_lost', $_POST['ct_lost']);
        $stmt->bindValue(':ct_won', $_POST['ct_won']);
        $stmt->bindValue(':t_lost', $_POST['t_lost']);

        $stmt->execute();

        // validation passes
        echo "Success!";
    }

    header('Location: /');
    die();
}

view('stats/table.php');