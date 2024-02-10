<?php

class DashboardController extends Controller {
    public function __construct() {
        parent::__construct();

        if (empty($_SESSION['logged_in'])) {
            header('location: ' . ROOT_URL);
        }

        if (isset($_GET['d'])) {
            $display = $_GET['d'];

            switch ($display) {
                case 'settings':
                    $this->view->display = 'settings';
                    $this->view->title = 'Settings';
                    $this->view->render('dashboard');
                    break;
                case 'new-blog':
                    isset($_POST['blog_submit']) && $this->create_new_blog();

                    $this->view->display = 'new-blog';
                    $this->view->title = 'Create New Blog';
                    $this->view->render('dashboard');
                    break;
                case 'admin':
                    $this->view->display = 'admin';
                    $this->view->title = 'User Management';
                    $this->view->render('dashboard');
                    break;
                default:
                    header('location: ' . ROOT_URL);
            }
        }
    }

    public function create_new_blog() {
        $input_values = $_POST;
        $file = $_FILES['blog_thumbnail'];

        $validation = $this->validate_img($file);

        if ($validation['error']) {
            echo $validation['message'];
        } else {
            if (is_uploaded_file($file['tmp_name'])) {
                $this->load_model('auth');
                $user = $this->model->select_user($_SESSION['email']);

                $blog = [
                    'title' => $input_values['blog_title'],
                    'content' => $input_values['blog_content'],
                    'thumbnail_url' => $file['name'],
                    'user_id' => $user['data']['user_id']
                ];

                $this->load_model('dashboard');
                $result = $this->model->insert_blog($blog);

                if ($result) {
                    $this->store_image_file($file);
                    $this->view->alert = [
                        'message' => 'Blog was successfully added',
                        'variant' => 'success'
                    ];
                } else {
                    $this->view->alert = [
                        'message' => 'Blog could not be added',
                        'variant' => 'danger'
                    ];
                }
            } else {
                echo 'temp file does not exists';
            }
        }
    }

    private function store_image_file($file) {
        $path = 'public/assets/images/';

        if (!is_dir($path)) mkdir($path, 0777, true);

        $file_ext = explode('.', $file['name']);
        $file_ext = strtolower($file_ext[1]);

        $file_name = uniqid();
        $file_name = $file_name . '.' . $file_ext;

        move_uploaded_file($file['tmp_name'], $path . $file_name);
    }

    private function validate_img($img_data) {
        $validate = ['error' => true];

        if ($img_data['error'] === 4) {
            $validate['message'] = 'IMAGE_ERROR';
        } else {
            $image_data = [
                'name' => $img_data['name'],
                'size' => $img_data['size']
            ];

            $image_ext = explode('.', $image_data['name']);
            $image_ext = strtolower(end($image_ext));

            if (!in_array($image_ext, ['jpg', 'jpeg', 'png'])) {
                $validate['message'] = 'IMAGE_EXTENSION_ERROR';
            } else if ($image_data['size'] > 5000000) {
                $validate['message'] = 'MAX_IMAGE_SIZE_ERROR';
            } else {
                $validate = [
                    'error' => false
                ];
            }
        }
        return $validate;
    }
}
