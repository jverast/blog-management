<?php

class HomeModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function select_all_blogs() {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM blogs');
            $stmt->execute();

            if (!$stmt) {
                return $this->result = [
                    'error' => true,
                    'message' => 'No blogs found'
                ];
            }

            $blogs = $stmt->fetchAll();
            return $this->result = [
                'error' => false,
                'data' => $blogs
            ];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
