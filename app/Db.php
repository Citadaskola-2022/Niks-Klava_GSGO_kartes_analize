<?php

namespace App;

use SQLite3;

class Db
{
    private static ?SQLite3 $instance = null;

    private function __construct() {}

    public static function getInstance(): SQLite3 {
        if (self::$instance === null) {
            self::$instance = new SQLite3(ROOT . '/db/project.sqlite3');
        }

        return self::$instance;
    }
}