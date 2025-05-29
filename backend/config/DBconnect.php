<?php

namespace backend\config;

use PDO;
use PDOException;

class DBconnect {
private static $instance = null;

private $connection;
private $host = 'localhost';
private $dbname = 'manhattan-bar';
private $username = 'root';
private $password = '';

    private  function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    private  function  __clone() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public  function  getConnection() {
        return $this->connection;
    }
}