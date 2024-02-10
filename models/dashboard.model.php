<?php

class DashboardModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function select_blog($blog_id) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM users WHERE blog_id = :blog_id');
            $stmt->execute(['blog_id' => $blog_id]);

            if (!$stmt) {
                return $this->result = [
                    'error' => true,
                    'message' => 'Not Found'
                ];
            }

            $blog = $stmt->fetch();
            return $this->result = [
                'error' => false,
                'data' => $blog
            ];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_blog($blog) {
        try {
            $stmt = $this->db->connection()->prepare('INSERT INTO blogs (title, content, thumbnail_url, user_id) VALUES(:title, :content, :thumbnail_url, :user_id)');

            $stmt->execute(
                [
                    'title' => $blog['title'],
                    'content' => $blog['content'],
                    'thumbnail_url' => $blog['thumbnail_url'],
                    'user_id' => $blog['user_id']
                ]
            );

            $this->result = ['error' => false, 'message' => null];
        } catch (PDOException $e) {
            $this->result = ['error' => true, 'message' => $e->getMessage()];
        }

        return $this->result;
    }
}
