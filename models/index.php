<?php

class Model {
    protected $db;
    protected $result;

    public function __construct() {
        $this->db = new Database();
    }

    public function select($email) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);

            if (!$stmt) {
                return $this->result = [
                    'error' => true,
                    'message' => 'user not found'
                ];
            }

            $user = $stmt->fetch();
            return $this->result = [
                'error' => false,
                'data' => $user
            ];
        } catch (PDOException $e) {
            $e->getMessage();
        }
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
