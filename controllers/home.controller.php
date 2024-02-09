<?php

class HomeController extends Controller {
    public function __construct() {
        parent::__construct();

        echo '<p>home controller</p>';
    }

    public function foo() {
        print_r($_GET);
    }
}
