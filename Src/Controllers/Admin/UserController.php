<?php
namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\UserModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate;
use Symfony\Component\VarDumper\VarDumper;

class UserController extends BaseController {
    public function index() {
        $UserModel = new UserModel();
        $data = $UserModel->findAllUser();
        echo $this->view->render('/Admin/Pages/Users/UsersList', ['data' => $data]);
    }

    public function addPage() {
        echo $this->view->render('/Admin/Pages/Users/UserAdd');
    }

    public function editPage($id) {
        $UserModel = new UserModel();
        $data = $UserModel->findUser($id);
        echo $this->view->render('/Admin/Pages/Users/UserEdit', ['data' => $data]);
    }

    public function updateUser($id) {
        $DataValidation = new DataValidate();
        $validation = $DataValidation($_POST, ['phone']);
    
        if(empty($validation)) {

            $UserModel = new UserModel();
            $checkUser = $UserModel->findUserWithEmail($_POST['email']);
            if(!empty($checkUser)) {
                if(!$checkUser['id'] === $id) {
                    Notification::success('Thất bại', 'Email đã tồn tại trong hệ thống');
                    header("location: /admin/edit-user/{$id}");
                    exit();
                }
            }
            $result = $UserModel->updateUser($id, $_POST);
            if($result) {
                Notification::success('Thành công', 'Đã sửa người dùng thành công');
                header("location: /admin/users");
                exit();
            } else {
                Notification::success('Thất bại', 'Đã xảy ra lỗi khi sửa người dùng');
                header("location: /admin/edit-user/{$id}");
                exit();
            }
        } else {

            Notification::success('Thất bại', 'Vui lòng nhập đầy đủ thông tin cần thiết');
            header('location: /admin/edit-user/{$id}');
            exit();
        }
    }
    public function insertUser() {
        $DataValidation = new DataValidate();
        $validation = $DataValidation($_POST, ['phone']);
    
        if(empty($validation)) {

            $UserModel = new UserModel();
            $checkUser = $UserModel->findUserWithEmail($_POST['email']);
            if(!empty($checkUser)) {
            Notification::success('Thất bại', 'Email đã tồn tại trong hệ thống');
                header('location: /admin/create-user');
                exit();
            }
            $result = $UserModel->insertUser($_POST);
            if($result) {
                Notification::success('Thành công', 'Đã thêm người dùng thành công');
                header('location: /admin/create-user');
                exit();
            } else {
                Notification::success('Thất bại', 'Đã xảy ra lỗi khi thêm người dùng');
                header('location: /admin/create-user');
                exit();
            }
        } else {

            Notification::success('Thất bại', 'Vui lòng nhập đầy đủ thông tin cần thiết');
            header('location: /admin/create-user');
            exit();
        }
    }
}