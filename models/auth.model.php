<?php

class AuthModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function select_user($email) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);

            if (!$stmt) {
                return $this->result = [
                    'error' => true,
                    'message' => 'Not Found'
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

    public function insert_user($data) {
        try {
            $stmt = $this->db->connection()->prepare('INSERT INTO users (first_name, last_name, email, hashed_password) VALUES(:first_name, :last_name, :email, :hashed_password)');

            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            $stmt->execute(
                [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'hashed_password' => $hashed_password
                ]
            );

            $this->result = ['error' => false, 'message' => null];
        } catch (PDOException $e) {
            $this->result = ['error' => true, 'message' => $e->getMessage()];
        }

        return $this->result;
    }

    public function compare($auth) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $auth['email']]);
            $user = $stmt->fetch();

            if (password_verify($auth['password'], $user['hashed_password'])) {
                $this->result = ['error' => false, 'message' => 'logged in'];
            } else {
                $this->result = ['error' => true, 'message' => 'wrong credentials'];
            }
        } catch (PDOException $e) {
            $this->result = ['error' => true, 'message' => $e->getMessage()];
        }

        return $this->result;
    }
}
