<?php

class HomeController extends Controller {
    public function __construct() {
        parent::__construct();

        $this->obtain_post_list();
    }

    public function obtain_post_list() {
        $this->load_model('home');
        $result = $this->model->select_all_blogs();

        if ($result['error']) {
            echo $result['message'];
        } else {
            $this->view->data['blogs'] = $result['data'];
            $this->view->render('home');
        }
    }
}
