<?php

class AuthModel extends Model {
    public function __construct() {
        parent::__construct();
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
