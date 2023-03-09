<?php

$db = new \SQLite3(ROOT . '/db/project.sqlite3');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validate data

    $stmt = $db->prepare(<<<SQL
        INSERT INTO stats (map, kills, deaths) VALUES (:map, :kills, :deaths)
    SQL);

    $stmt->bindValue(':map', $_POST['map']);
    $stmt->bindValue(':kills', $_POST['kills']);
    $stmt->bindValue(':deaths', $_POST['deaths']);
    $stmt->execute();



    // save data


    header('Location: /');
    die();
}

view('stats/table.php');