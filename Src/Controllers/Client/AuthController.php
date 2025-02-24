<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;
use Src\Helpers\ProvinceApi;
use Src\Models\Client\AddressModel;
use Src\Models\Client\OrderModel;
use Src\Models\Client\UserModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate;

class AuthController extends BaseController {
    public function loadOrder() {
        if(!isset($_SESSION['user']['id'])) {
            header('location: /dang-nhap');
            exit();
        }
        $OrderModel = new OrderModel();
        $data = $OrderModel->getAllUserOrder($_SESSION['user']['id']);
        echo $this->view->render('Client/Pages/UserOrders', ['orderData' => $data]);

    }


    public function changePassword() {
        $DataValidation = new DataValidate;
        $Validation = $DataValidation($_POST);
        if(empty($Validation)) {
            $UserModel = new UserModel();
            $user = $UserModel->findUser($_SESSION['user']['id']);
            
            if(!password_verify($_POST['currentPassword'], $user['password'])) {
                Notification::error('Thất bại', 'Mật khẩu hiện tại không đúng');
                header('location: /doi-mat-khau');
                exit();
            }

            if($_POST['newPassword'] !== $_POST['confirmPassword']) {
                Notification::error('Thất bại', 'Xác nhận mật khẩu không đúng');
                header('location: /doi-mat-khau');
                exit();
            }

            $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $result = $UserModel->updateUser($_SESSION['user']['id'], ['password' => $password]);
            if(!$result) {
                Notification::error('Thất bại', 'Có lỗi đã xảy ra, xin vui lòng thử lại');
                header('location: /doi-mat-khau');
                exit();
            }

            Notification::success('thành công', 'Đã đổi mật khẩu thành công');
            header('location: /doi-mat-khau');
            exit();
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /doi-mat-khau');
            exit();
        }
    }
    public function deleteAddress($id) {
        $AddressModel = new AddressModel();
        $result = $AddressModel->deleteAddress($id);
        if($result) {
            Notification::success('Xóa thành công', 'Đã xóa thành công địa chỉ');
            header('location: /dia-chi');
            exit();
        } else {
            Notification::error('Xóa thất bại', 'Đã xảy ra lỗi');
            header('location: /dia-chi');
            exit();
        }
    }

    public function changePasswordPage() {
        if(!isset($_SESSION['user']['id'])) {
            header('location: /dang-nhap');
            exit();
        }
        echo $this->view->render('Client/Pages/UserPassword');
    }
    public function insertAddress() {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $AddressModel = new AddressModel();

            list($province_name, $province_id) = explode('|', $_POST['city']);
            list($district_name, $district_id) = explode('|', $_POST['district']);
            list($ward_name, $ward_id) = explode('|', $_POST['ward']);

            $data = [
                'province_name' => $province_name,
                'province_id' => $province_id,
                'district_name' => $district_name,
                'district_id' => $district_id,
                'ward_name' => $ward_name,
                'ward_id' => $ward_id,
                'user_id' => $_SESSION['user']['id'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone']
            ];
            $result = $AddressModel->insertAddress($data);
            if ($result) {
                Notification::success('Thành công', 'Đã thêm địa chỉ');
                header('location: /dia-chi');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi thêm địa chỉ');
                header('location: /dia-chi');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /dia-chi');
            exit();
        }
    }

    public function addressPage() {
        if(!isset($_SESSION['user'])) {
            header('location: /tai-khoan');
            exit();
        }

        $UserModel = new UserModel();
        $data = $UserModel->findUserWithAddress($_SESSION['user']['id']);
        echo $this->view->render('/Client/Pages/UserAddress', ['data' => $data]);
    }
    public function loadLogin() {
        if(isset($_SESSION['user'])) {
            header('location: /tai-khoan');
            exit();
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