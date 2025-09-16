<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\BrandModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate; 
class   BrandController extends BaseController {
    public function index() {
        $BrandModel = new BrandModel();
        $data = $BrandModel->findAllBrands();
        echo $this->view->render('/Admin/Pages/Brands/BrandsList', ['data' => $data]);
    }
    

    public function addPage() {
        echo $this->view->render('/Admin/Pages/Brands/BrandAdd');
    }

    public function editPage($id) {
        $BrandModel = new BrandModel();
        $data = $BrandModel->findOneBrand($id);
        echo $this->view->render('/Admin/Pages/Brands/BrandEdit', ['data' => $data]);
    }

    public function insertBrand() {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $BrandModel = new BrandModel();
            if ($BrandModel->findExistedBrand($_POST['name'])) {
                Notification::error('Thất bại', 'Thương hiệu này đã tồn tại');

                header('location: /admin/brands');
                exit();
            }

            $result = $BrandModel->insertBrand($_POST);
            if ($result) {
                Notification::success('Thành công', 'Đã thêm thương hiệu');
                header('location: /admin/brands');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi thêm thương hiệu');

                header('location: /admin/brands');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập thông tin thương hiệu');

            header('location: /admin/brands');
            exit();
        }
    }

    public function updateBrand($id) {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $BrandModel = new BrandModel();
            if ($BrandModel->findExistedBrand($_POST['name']) && $BrandModel->findExistedBrand($_POST['name'])['id'] === $id) {
                Notification::error('Thất bại', 'Thương hiệu này đã tồn tại');
                header('location: /admin/brands');
                exit();
            }

            $result = $BrandModel->updateBrand($id, $_POST);
            if ($result) {
                Notification::success('Thành công', 'Đã cập nhật Thương hiệu');
                header('location: /admin/brands');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi cập nhật Thương hiệu');
                header('location: /admin/brands');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập thông tin Thương hiệu');
            header('location: /admin/brands');
            exit();
        }
    }
    public function delete($id) {
        $BrandModel = new BrandModel();
        $result = $BrandModel->deleteBrand($id);
        if($result) {
            Notification::success('Thành công', 'Đã xóa thành công');
            header('location: /admin/brands');
            exit();
        } else {
            Notification::error('Thất bại', 'Xảy ra lỗi khi xóa');
            header('location: /admin/brands');
            exit();
        }
    }
}