<?php

class HelpController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->render('help');
    }
}
