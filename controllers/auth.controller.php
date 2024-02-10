<?php

class AuthController extends Controller {
    public function __construct() {
        parent::__construct();

        if (isset($_GET['d'])) {
            $display = $_GET['d'];

            switch ($display) {
                case 'login':
                    $this->view->display = 'login';
                    $this->view->render('auth');
                    break;
                case 'register':
                    $this->view->display = 'register';
                    $this->view->render('auth');
                    break;
                default:
                    $error_controller = new ErrorController();
                    $error_controller->details = [
                        'code' => 404,
                        'error_message' => 'Page Not found'
                    ];
            }
        }
    }

    public function register() {
        $data = $this->sanitize_input_data($_POST);

        if ($data['password'] !== $data['confirm_password']) {
            $this->view->alert = [
                'message' => 'Please make sure your passwords match',
                'variant' => 'danger'
            ];

            $this->view->display = 'register';
            $this->view->render('auth');
        } else {
            $this->load_model();
            $result = $this->model->insert($data);

            if ($result['error']) {
                $this->view->alert = [
                    'message' => 'Error trying to add user to database',
                    'variant' => 'danger'
                ];
            } else {
                $_SESSION['email'] = $data['email'];
                $_SESSION['logged_in'] = true;

                header('location: ' . ROOT_URL);
            }
        }
    }

    public function login() {
        $auth = $this->sanitize_input_data($_POST);

        $this->load_model('auth');
        $authenticated = $this->authenticate($auth);

        if ($authenticated) {
            $user = $this->model->select($auth['email']);

            $_SESSION['email'] = $auth['email'];
            $_SESSION['is_admin'] = $user['data']['is_admin'] ? true : false;
            $_SESSION['logged_in'] = true;

            header('location: ' . ROOT_URL);
        } else {
            $this->view->alert = [
                'message' => 'Wrong credentials. Invalid email or password',
                'variant' => 'danger'
            ];

            $this->view->display = 'login';
            $this->view->render('auth');
        }
    }

    private function authenticate($auth) {
        $result = $this->model->compare($auth);

        if ($result['error']) {
            return false;
        } else {
            return true;
        }
    }

    private function sanitize_input_data($data) {
        $data = array_filter($data, function ($value) {
            $value = trim($value);
            return true;
        });

        foreach ($data as &$value) {
            $value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        unset($value);

        return $data;
    }
}
