<?php

class HomeController extends Controller {
    public $current_page;
    private $blogs_per_page = 6;

    public function __construct() {
        parent::__construct();

        if (isset($_GET['search'])) {
            $this->search_blogs();
        } else {
            if (!isset($_GET['page'])) {
                $this->current_page = 1;
            } else {
                $this->current_page = $_GET['page'];
            }
            $this->obtain_blogs_list_by_page();
        }
    }

    public function search_blogs() {
        $keyword = $_GET['search'];

        $this->load_model('home');
        $result = $this->model->search_from_blogs($keyword);

        if ($result['error']) {
            $this->view->alert = [
                'message' => $result['message'],
                'variant' => 'danger'
            ];
        } else {
            $this->view->data['blogs'] = $result['data'];
            $this->view->display = 'search';
        }

        $this->view->render('home');
    }

    public function obtain_blog_list() {
        $this->load_model('home');
        $result = $this->model->select_all_blogs();

        if ($result['error']) {
            $this->view->alert = [
                'message' => $result['message'],
                'variant' => 'danger'
            ];
        } else {
            $this->view->data['blogs'] = $result['data'];
        }

        $this->view->render('home');
    }

    public function obtain_blogs_list_by_page() {
        $offset = ($this->current_page - 1) * $this->blogs_per_page;

        $this->load_model('home');

        $result = $this->model->count_blogs();
        $pages = ceil($result / $this->blogs_per_page);

        $result = $this->model->select_blogs_by_page($this->blogs_per_page, $offset);

        if ($result['error']) {
            $this->view->alert = [
                'message' => $result['message'],
                'variant' => 'danger'
            ];
        } else {
            $this->view->data = [
                'blogs' => $result['data'],
                'pages' => $pages,
                'current_page' => $this->current_page
            ];
        }

        $this->view->render('home');
    }
}
