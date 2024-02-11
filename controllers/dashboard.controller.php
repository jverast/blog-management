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
                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
                        isset($_GET['r']) && $this->delete_user($_GET['r']);
                        $this->obtain_user_list();

                        $this->view->display = 'admin';
                        $this->view->title = 'User Management';
                        $this->view->render('dashboard');
                        break;
                    }
                default:
                    header('location: ' . ROOT_URL);
            }
        }
    }

    public function obtain_user_list() {
        $this->load_model('dashboard');
        $result = $this->model->select_all_users();

        if (!$result) {
            echo 'ERROR: ' . $result['message'];
        } else {
            $this->view->data['users'] = $result['data'];
        }
    }

    public function delete_user($user_id) {
        $this->load_model('dashboard');
        $result = $this->model->drop_user($user_id);

        if (!$result) {
            $this->view->alert = [
                'message' => 'ERROR: ' . $result['message'],
                'variant' => 'danger'
            ];
        } else {
            $this->view->alert = [
                'message' => $result['message'],
                'variant' => 'success'
            ];
        }
    }

    public function create_new_blog() {
        $input_values = $_POST;
        $file = $_FILES['blog_thumbnail'];

        $validation = $this->validate_img($file);

        if ($validation['error']) {
            $this->view->alert = [
                'message' => $validation['message'] . ': Blog could not be added',
                'variant' => 'danger'
            ];
        } else {
            if (is_uploaded_file($file['tmp_name'])) {
                $path = 'public/assets/images/';
                $file_name = $this->build_file_name($file, $path);

                $blog = [
                    'title' => $input_values['blog_title'],
                    'content' => $input_values['blog_content'],
                    'thumbnail_url' => $file_name,
                    'user_id' => $_SESSION['user_id']
                ];

                $this->load_model('dashboard');
                $result = $this->model->insert_blog($blog);

                if ($result) {
                    move_uploaded_file($file['tmp_name'], $path . $file_name);
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
                echo 'TEMP_FILE_DOESNT_EXIST';
            }
        }
    }

    private function build_file_name($file, $path) {
        if (!is_dir($path)) mkdir($path, 0777, true);

        $file_ext = explode('.', $file['name']);
        $file_ext = strtolower($file_ext[1]);

        $file_name = uniqid();
        $file_name = $file_name . '.' . $file_ext;
        return $file_name;
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
