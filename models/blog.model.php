<?php

class BlogModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function select_blog($blog_id) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT b.title, b.excerpt, b.thumbnail_url, b.created_at, u.first_name, u.last_name, u.email FROM blogs b INNER JOIN users u ON b.user_id = u.user_id WHERE b.blog_id = :blog_id');
            $stmt->execute(['blog_id' => $blog_id]);

            $blog = $stmt->fetch();

            if (empty($blog)) {
                $this->result = [
                    'error' => true,
                    'message' => 'No blog found'
                ];
            } else {
                $this->result = [
                    'error' => false,
                    'data' => $blog
                ];
            }

            return $this->result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
