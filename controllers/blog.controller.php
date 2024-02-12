<?php

class BlogController extends Controller {
    public function __construct() {
        parent::__construct();

        if (isset($_GET['id'])) {
            $this->obtain_blog();
        }
    }

    public function obtain_blog() {
        $blog_id = $_GET['id'];

        $this->load_model('blog');
        $result = $this->model->select_blog($blog_id);

        if ($result['error']) {
            echo $result['message'];
        } else {
            // $this->readable_array($result['data']);
            $this->view->data['blog'] = $result['data'];
            $this->view->render('blog');
        }
    }
}
