<?php

class Controller {
    public $view;
    public $model;

    public function __construct() {
        $this->view = new View();
    }

    public function load_model($name = NULL) {
        if (isset($name)) {
            $path = 'models/' . $name . '.model.php';
        } else {
            $path = 'models/index.php';

            require_once $path;
            $model_name = 'Model';
            $this->model = new $model_name();

            return;
        }

        if (is_file($path)) {
            require_once $path;

            $model_name = ucfirst($name) . 'Model';
            $this->model = new $model_name();
        }
    }
}
