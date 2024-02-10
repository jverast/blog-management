<?php

class ErrorController extends Controller {
    public $details;

    public function __construct() {
        parent::__construct();

        $this->view->render('error');
    }
}
