<?php

class BlogModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function select_blog($blog_id) {
        try {
            $stmt = $this->db->connection()->prepare('SELECT b.title, b.content, b.thumbnail_url, b.created_at, u.first_name, u.last_name, u.email FROM blogs b INNER JOIN users u ON b.user_id = u.user_id WHERE b.blog_id = :blog_id');
            $stmt->execute(['blog_id' => $blog_id]);

            if ($stmt->rowCount() === 0) {
                throw new Exception('No blogs found');
            }

            $blog = $stmt->fetch();

            $this->result = [
                'error' => false,
                'data' => $blog
            ];
        } catch (Exception $e) {
            $this->result = [
                'error' => true,
                'message' => $e->getMessage()
            ];
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $this->result;
    }
}
