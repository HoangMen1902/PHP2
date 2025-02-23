<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;
use Src\Models\Client\UserModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate;

class AuthController extends BaseController {
    public function loadLogin() {
        if(isset($_SESSION['user'])) {
            header('location: /tai-khoan');
        }
        echo $this->view->render('/Client/Pages/Login');
    }
    public function loadRegister() {
        if(isset($_SESSION['user'])) {
            header('location: /tai-khoan');
        }
        echo $this->view->render('/Client/Pages/Register');
    }

    public function loadProfile() {
        if(!isset($_SESSION['user'])) {
            Notification::error('Vui lòng đăng nhập', 'Vui lòng đăng nhập tài khoản');
            header('location: /dang-nhap');
            exit();
        }

        $UserModel = new UserModel();
        $user = $UserModel->findUser($_SESSION['user']['id']);
        echo $this->view->render('/Client/Pages/User', ['data' => $user]);
    }


    public function register() {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $UserModel = new UserModel();
            if ($UserModel->findExistedUser($_POST['email'])) {
                Notification::error('Thất bại', 'Email đã tồn tại trong hệ thống');
                header('location: /dang-ky');
                exit();
            }
            $data = $_POST;
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $result = $UserModel->insertUser($data);
            if ($result) {
                Notification::success('Thành công', 'Đã đăng ký thành công tài khoản');
                header('location: /dang-nhap');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi đăng ký tài khoản');
                header('location: /dang-ky');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /dang-ky');
            exit();
        }
    }

    public function login() {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $UserModel = new UserModel();
            $user = $UserModel->findExistedUser($_POST['email']);
            if (!empty($user) && password_verify($_POST['password'], $user['password'])) {
                unset($user['password']);
                $_SESSION['user'] = $user;
                Notification::success('Thành công', 'Đã đăng nhập thành công');
                header('location: /home');
                exit();
            } else {
                Notification::error('Thất bại', 'Thông tin tài khoản không chính xác');
                header('location: /dang-nhap');
                exit(); 
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /dang-nhap');
            exit(); 
        }
    }


    public function logout() {
        if($_SESSION['user']) {
            unset($_SESSION['user']);
            Notification::success('Thành công', 'Đăng xuất thành công');
            header('location: /home');
            exit();
        } else {
            header('location: /home');
        }
    }

    public function updateProfile() {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $UserModel = new UserModel();
            $result = $UserModel->updateUser($_SESSION['user']['id'], $_POST);
            if ($result) {
                $user = $UserModel->find($_SESSION['user']['id']);
                unset($_SESSION['user']);
                unset($user['password']);
                $_SESSION['user'] = $user;
                
                Notification::success('Thành công', 'Đã cập nhật thành công tài khoản');
                header('location: /tai-khoan');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi cập nhật tài khoản');
                header('location: /tai-khoan');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /tai-khoan');
            exit();
        }
    }
}