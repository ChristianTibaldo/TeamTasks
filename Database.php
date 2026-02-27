<?php

use PDO;

class Database
{
    private static $instance = null;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=", "root", "team_tasks");
    }

    public static function getInstance()
    {
        if (self::$instance === null)
            self::$instance = new self();//chiamata al costruttore
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
