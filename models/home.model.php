<?php

class HomeModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function count_blogs() {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM blogs');
            $stmt->execute();

            $this->result = $stmt->rowCount();

            return $this->result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
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

    public function select_blogs_by_page($blogs_per_page, $offset) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM blogs ORDER BY blog_id LIMIT :blogs_per_page OFFSET :offset');
            $stmt->execute(['blogs_per_page' => $blogs_per_page, 'offset' => $offset]);

            if ($stmt->rowCount() === 0) {
                throw new Exception('No blogs found');
            }

            $blogs = $stmt->fetchAll();
            return $this->result = [
                'error' => false,
                'data' => $blogs
            ];
        } catch (Exception $e) {
            return $this->result = [
                'error' => true,
                'message' => 'No blogs found'
            ];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
