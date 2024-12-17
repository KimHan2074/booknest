<?php
session_start();
class userController extends DController {
    public function __construct() {
        parent::__construct();
    }

    public function registerForm() {
        $this->load->view('register_form');
    }

    public function register() {
        $userModel = $this->load->model('userModel');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = "";

        // Ràng buộc
        // Kiểm tra input rỗng
        if (empty($username) || empty($email) || empty($password)) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Vui lòng điền đầy đủ thông tin!'
            ];
            header('Location: /booknest_website/userController/registerForm');
            exit();
        }
        // Kiểm tra đúng định dạng email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Email không đúng định dạng!'
            ];
            header('Location: /booknest_website/userController/registerForm');
            exit();
        }
        // Kiểm tra độ dài mật khẩu
        if (strlen($password) < 6) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Mật khẩu phải có ít nhất 6 ký tự!'
            ];
            header('Location: /booknest_website/userController/registerForm');
            exit();
        }

        // Kiểm tra user có tồn tại trong db chưa
        $table_user = "users";
        $existingUser = $userModel->checkUserExists($table_user, $email);
        if ($existingUser) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Email này đã tồn tại. Vui lòng dùng email khác!'
            ];
            header('Location: /booknest_website/userController/registerForm');
            exit();
        }

        $data = array(
            'username' => $username,
            'password' => md5($password),
            'email' => $email,
            'phone' => $phone
        );

        
        $result = $userModel->insertUser($table_user, $data);

        if ($result == 1) {
            $_SESSION['flash_message'] = [
                'type' => 'success',
                'message' => 'Đăng ký thành công! Vui lòng đăng nhập!'
            ];
            header('Location: /booknest_website/');
            exit();
        } else {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Đăng ký thất bại. Vui lòng thử lại!'
            ];
            header('Location: /booknest_website/userController/registerForm');
            exit();
        }
    }

    public function login(){

    }
}