<?php

class DashboardModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function select_all_users() {
        try {
            $stmt = $this->db->connection()->prepare('SELECT * FROM users');
            $stmt->execute();

            if (!$stmt) {
                return $this->result = [
                    'error' => true,
                    'message' => 'Not Found'
                ];
            }

            $users = $stmt->fetchAll();
            return $this->result = [
                'error' => false,
                'data' => $users
            ];
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function drop_user($user_id) {
        try {
            $stmt = $this->db->connection()->prepare('DELETE FROM users WHERE user_id = :user_id');
            $stmt->execute(['user_id' => $user_id]);

            if (!$stmt) {
                return $this->result = [
                    'error' => true,
                    'message' => 'User not found or already removed'
                ];
            }

            return $this->result = [
                'error' => false,
                'message' => 'User was successfully removed'
            ];
        } catch (PDOException $e) {
            $e->getMessage();
        }
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
            $stmt = $this->db->connection()->prepare('INSERT INTO blogs (title, excerpt, content, thumbnail_url, user_id) VALUES(:title, :excerpt, :content, :thumbnail_url, :user_id)');

            $stmt->execute(
                [
                    'title' => $blog['title'],
                    'excerpt' => $blog['excerpt'],
                    'content' => $blog['content'],
                    'thumbnail_url' => $blog['thumbnail_url'],
                    'user_id' => $blog['user_id']
                ]
            );

            return $this->result = ['error' => false, 'message' => null];
        } catch (PDOException $e) {
            return $this->result = ['error' => true, 'message' => $e->getMessage()];
        }
    }
}
