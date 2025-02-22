<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\OptionModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate;

class AttributeController extends BaseController
{

    public function attributeList()
    {
        $OptionModel = new OptionModel();
        $data = $OptionModel->findAllOptions();
        echo $this->view->render('/Admin/Pages/Attribute/AttributeList', ['data' => $data]);
    }

    public function attributeAdd()
    {
        echo $this->view->render('/Admin/Pages/Attribute/AttributeAdd');
    }

    public function attributeEdit($id)
    {
        $OptionModel = new OptionModel();
        $data = $OptionModel->findOneOption($id);
        echo $this->view->render('/Admin/Pages/Attribute/AttributeEdit', ['data' => $data]);
    }

    public function updateAttribute($id)
    {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $OptionModel = new OptionModel();
            if ($OptionModel->findExistedOption($_POST['name']) && $OptionModel->findExistedOption($_POST['name'])['id'] != $id) {
                Notification::error('Thất bại', 'Thuộc tính này đã tồn tại');
                header('location: /admin/allAttribute');
                exit();
            }

            $result = $OptionModel->updateOption($id, $_POST);
            if ($result) {
                Notification::success('Thành công', 'Đã cập nhật thuộc tính');
                header('location: /admin/allAttribute');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi cập nhật thuộc tính');
                header('location: /admin/allAttribute');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập thông tin thuộc tính');
            var_dump($validation);
            header('location: /admin/allAttribute');
            exit();
        }
    }

    public function insertAttribute()
    {
        $DataValidate = new DataValidate;
        $validation = $DataValidate($_POST);

        if (empty($validation)) {
            $OptionModel = new OptionModel();
            if ($OptionModel->findExistedOption($_POST['name'])) {
                Notification::error('Thất bại', 'Thuộc tính này đã tồn tại');
                header('location: /admin/attribute');
                exit();
            }

            $result = $OptionModel->insertOption($_POST);
            if ($result) {
                Notification::success('Thành công', 'Đã thêm thuộc tính');
                header('location: /admin/attribute');
                exit();
            } else {
                Notification::error('Thất bại', 'Đã xảy ra lỗi khi thêm thuộc tính');
                header('location: /admin/attribute');
                exit();
            }
        } else {
            Notification::error('Thất bại', 'Vui lòng nhập thông tin thuộc tính');
            var_dump($validation);
            header('location: /admin/attribute');
            exit();
        }
    }
}
