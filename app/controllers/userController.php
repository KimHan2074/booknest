<?php
session_start();
class userController extends DController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function registerForm()
    {
        $this->load->view('register_form');
    }
    public function forgetPassForm() {
        $this->load->view('forgotPassword');
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->load->model('userModel');
            $email = $_POST['email'];
            $table = 'users';

            if ($userModel->checkUserExists($table,$email)) {
                $resetCode = rand(100000, 999999);
                session_start();
                $_SESSION['reset_code'] = $resetCode;
                $_SESSION['reset_email'] = $email;
                $_SESSION['reset_expiry'] = time() + 60;

                // Gửi email reset
                if (sendCodeResetPassword($email, $resetCode)) {
                    echo "Reset code sent to your email!";
                } else {
                    echo "Failed to send reset email.";
                }
            } else {
                echo "Email does not exist.";
            }
        }
    }

    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $enteredCode = $_POST['reset_code'];
            $newPassword = $_POST['new_password'];
    
            // Kiểm tra mã reset
            if (isset($_SESSION['reset_code']) && isset($_SESSION['reset_expiry']) && time() < $_SESSION['reset_expiry']) {
                if ($enteredCode == $_SESSION['reset_code']) {
                    // Đặt lại mật khẩu
                    $email = $_SESSION['reset_email'];
                    $userModel = new UserModel();
                    // if ($userModel->updatePassword($email, $newPassword)) {
                    //     // Xóa thông tin reset khỏi session
                    //     unset($_SESSION['reset_code'], $_SESSION['reset_email'], $_SESSION['reset_expiry']);
                    //     echo "Password reset successfully!";
                    // } else {
                    //     echo "Failed to reset password.";
                    // }
                } else {
                    echo "Invalid reset code.";
                }
            } else {
                echo "Reset code expired or invalid.";
            }
        } else {
            require 'views/reset_password.php';
        }
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
            header('Location: /booknest_website/userController/loginForm');
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

    // Function Show màn hình login
    public function loginForm()
    {
        $this->load->view('login_form');
    }

    // Function xử lý khi click Login trong LoginForm
    public function login()
    {
        $userModel = $this->load->model('userModel');

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra input không rỗng
        if (empty($username) || empty($password)) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Vui lòng điền đầy đủ thông tin!'
            ];
            header('Location: /booknest_website/userController/loginForm');
            exit();
        }

        // Kiểm tra độ dài mật khẩu
        if (strlen($password) < 6) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Mật khẩu phải có ít nhất 6 ký tự!'
            ];
            header('Location: /booknest_website/userController/loginForm');
            exit();
        }

        // Lấy thông tin user dựa theo username từ input
        $table_user = "users";
        $field_name = "username";
        $user = $userModel->checkUserExistsByField($table_user, $field_name, $username);

        if (!$user) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Tài khoản này không tồn tại, vui lòng kiểm tra lại thông tin!'
            ];
            header('Location: /booknest_website/userController/loginForm');
            exit();
        }

        $hashed_password = md5($password);

        if ($hashed_password != $user["password"]) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Không đúng mật khẩu, vui lòng kiểm tra lại!'
            ];
            // header('Location: /booknest_website/userController/loginForm');
            // exit();
        }

        // Lưu session vào trong browser để dùng cho các 
        // lần tới mà không cần login lại
        session_start(); 
        $_SESSION['user_id'] = $user["username"];
        $_SESSION['username'] = $user["username"];
        $_SESSION['email'] = $user["email"];
        $_SESSION['is_logged_in'] = true;

        $_SESSION['flash_message'] = [
            'type' => 'success',
            'message' => 'Đăng nhập thành công!'
        ];
        header('Location: /booknest_website/');
        exit();
    }

    public function logout()
    {
        // Xoá dữ liệu session
        session_unset();

        // Hủy session
        session_destroy();

        // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chủ
        header('Location: /booknest_website/');
        exit();
    }
}
