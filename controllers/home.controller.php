<?php

class HomeController extends Controller {
    public function __construct() {
        parent::__construct();

        $this->view->render('home');
    }
}
