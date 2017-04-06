<?php

namespace App;

use PDO;

class Database
{
    private static $instance;

    public static function getConnection()
    {
        if ( !empty(self::$instance) ) {
            return self::$instance;
        }

        $parameters = include ROOT . '/config/database.php';

        $dsn = 'mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'];
        $db = new PDO($dsn, $parameters['user'], $parameters['password']);
        $db->exec('set names utf8');

        self::$instance = $db;

        return self::$instance;
    }
}