<?php

class AuthController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->view->display = 'login';
        $this->view->render('auth');
    }

    public function register() {
        $this->view->display = 'register';
        $this->view->render('auth');
    }
}
