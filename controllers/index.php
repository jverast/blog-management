<?php

class Controller {
    public $view;
    public $model;

    public function __construct() {
        $this->view = new View();

        if (isset($_GET['action']) && $_GET['action'] === 'logout') {
            $this->logout();
        }
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

    public function logout() {
        session_status() !== PHP_SESSION_ACTIVE && session_start();

        session_unset();
        session_destroy();

        header('location: ' . ROOT_URL);
    }

    public function readable_array($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}
