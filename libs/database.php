<?php

class Database {
    private $HOST;
    private $NAME;
    private $USER;
    private $PASSWORD;

    public function __construct() {
        $this->HOST = DB_HOST;
        $this->NAME = DB_NAME;
        $this->USER = DB_USER;
        $this->PASSWORD = DB_PASSWORD;
    }

    public function connection() {
        try {
            $connection = 'mysql:host=' . $this->HOST . ';dbname=' . $this->NAME . ';charset=utf8';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($connection, $this->USER, $this->PASSWORD, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r('message error: ' . $e->getMessage());
        }
    }
}
