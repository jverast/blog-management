<?php

class Model {
    private $db;
    private $result;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($data) {
        try {
            $stmt = $this->db->connection()->prepare('INSERT INTO users (first_name, last_name, email, hashed_password) VALUES(:first_name, :last_name, :email, :hashed_password)');

            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            $stmt->execute([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'hashed_password' => $hashed_password
            ]);

            $this->result = ['error' => false, 'message' => null];
        } catch (PDOException $e) {
            $this->result = ['error' => true, 'message' => $e->getMessage()];
        }

        return $this->result;
    }
}
