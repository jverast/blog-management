<?php

require_once 'controllers/error.controller.php';

final class App {
    private $url;

    public function __construct() {
        if (empty($_SESSION)) session_start();

        $this->url = $_GET['url'] ?? NULL;

        if (empty($this->url)) {
            $this->url = ['home'];
        } else {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', $this->url);
        }

        $path = 'controllers/' . $this->url[0] . '.controller.php';

        if (!is_file($path)) {
            $controller = new ErrorController();
        } else {
            require_once $path;

            $controller = ucfirst($this->url[0]) . 'Controller';
            $controller = new $controller();

            if (isset($this->url[1])) {
                try {
                    $controller->{$this->url[1]}();
                } catch (Error $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
}
