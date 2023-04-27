<?php

$tableData = \App\Stats::getArrayByUserId(\App\User::currentUser()->id);

view('stats/index.php', [
    'tableData' => $tableData
]);