<?php

class ErrorController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->render('error');
    }
}
