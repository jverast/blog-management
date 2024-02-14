<?php

class ContactController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->render('contact');
    }
}
