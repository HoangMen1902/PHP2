<?php

namespace  Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\CategoryModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate;

class CategoryController extends BaseController {
    public function index() {
        $CategoryModel = new CategoryModel();
        $data = $CategoryModel->findAllCategory();
        echo $this->view->render('/Admin/Pages/Category/CategoryList', ['data' => $data]);
    }

    public function categoryAdd() {
        echo $this->view->render ('/Admin/Pages/Category/CategoryAdd');
    }

    public function categoryEdit($id) {
        $CategoryModel = new CategoryModel();
        $data = $CategoryModel->findCategory($id);
        echo $this->view->render ('/Admin/Pages/Category/CategoryEdit', ['category' => $data]);
    }

    public function updateCategory($id) {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $CategoryModel = new CategoryModel();
            if ($CategoryModel->findExistedCategory($_POST['name']) && $CategoryModel->findExistedCategory($_POST['name'])['id'] === $id) {
                Notification::error('Thất bại', 'Phân loại này đã tồn tại');
                header('location: /admin/categories');
                exit();
            }

            $result = $CategoryModel->updateCategory($id, $_POST);
            if ($result) {
                Notification::success('Thành công', 'Đã cập nhật Phân loại');
                header('location: /admin/categories');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi cập nhật Phân loại');
                header('location: /admin/categories');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập thông tin Phân loại');
            header('location: /admin/categories');
            exit();
        }
    }

    public function insertCategory() {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $CategoryModel = new CategoryModel();
            if ($CategoryModel->findExistedCategory($_POST['name'])) {
                Notification::error('Thất bại', 'Phân loại này đã tồn tại');
                header('location: /admin/categories');
                exit();
            }

            $result = $CategoryModel->insertCategory($_POST);
            if ($result) {
                Notification::success('Thành công', 'Đã thêm Phân loại');
                header('location: /admin/categories');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi thêm Phân loại');
                header('location: /admin/categories');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập thông tin Phân loại');
            header('location: /admin/categories');
            exit();
        }
    }
}