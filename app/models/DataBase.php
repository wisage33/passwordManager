<?php

namespace models;

use PDO;

class DataBase
{
    private $pdo;
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['db']}";
        $this->pdo = new PDO($dsn, $config['user'], $config['pass']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getConnection()
    {
        echo "<script>console.log('Connection successfully')</script>";
        return $this->pdo;
    }
}