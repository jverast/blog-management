<?php

class View {
    public $alert;

    public function __construct() {
        // ...
    }

    public function render($view) {
        $path = 'views/' . $view . '/index.php';

        if (!is_file($path)) {
            echo 'view not found';
            exit;
        } else {
            require_once $path;
        }
    }
}
