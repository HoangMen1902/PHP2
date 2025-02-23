<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\BrandModel;
use Src\Models\Admin\CategoryModel;
use Src\Models\Admin\OptionModel;
use Src\Models\Admin\OptionValueModel;
use Src\Models\Admin\ProductModel;
use Src\Models\Admin\SkuModel;
use Src\Models\Admin\SkuValueModel;
use Src\Notifications\Notification;
use Symfony\Component\VarDumper\VarDumper;

class ProductController extends BaseController
{
    public function index()
    {
        $ProductModel = new ProductModel();
        $data = $ProductModel->findAllProduct();
        echo $this->view->render('/Admin/Pages/Products/ProductList', ['data' => $data]);
    }

    public function addPage()
    {
        $CategoryModel = new CategoryModel();
        $BrandModel = new BrandModel();
        $OptionModel = new OptionModel();
        $options = $OptionModel->findAll();
        echo $this->view->render('/Admin/Pages/Products/ProductAdd', ['categories' => $CategoryModel->findAllCategory(), 'brands' => $BrandModel->findAllBrands(), 'options' => $options]);
    }

    public function add()
    {
        echo "<pre>";
        $productInfo = [];
        $productInfo['total_quantity'] = 0;
        $total_quantity = 0;
        $firstSku = [];
        $firstOption = [];
        $optionValuesInsert = [];
        foreach ($_POST as $key => $value) {
            if ($key === 'sku') {
                break;
            }
            if ($key === 'options_base' || $key === 'values_base') {
                $new_key = preg_replace('/_base$/', '', $key);
                $firstOption[$new_key] = $value;
                continue;
            }
            if ($key === 'sku_base' || $key === 'quantity_base' || $key === 'price_base') {
                $new_key = preg_replace('/_base$/', '', $key);
                $firstSku[$new_key] = $value;
                continue;
            }
            $productInfo[$key] = $value;
        }
        $total_quantity += $firstSku['quantity'];


        $target_dir = "Public/Uploads/";
        $extension = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
        $new_filename = time() . '_' . bin2hex(random_bytes(3)) . "." . $extension;
        $target_file = $target_dir . $new_filename;


        if ($extension !== 'jpg' && $extension !== 'png') {
            Notification::error('Thất bại', 'Thêm thất bại, Hình ảnh không hợp lệ');
            header('location: /admin/product/add');
            exit();
        }
        if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            die("Lỗi: Không thể di chuyển file vào $target_file");
        }



        $_FILES["thumbnail"]["tmp_name"] = $target_file;

        $productInfo['thumbnail'] = $new_filename;

        $ProductModel = new ProductModel();
        $SkuModel = new SkuModel();
        $OptionValueModel = new OptionValueModel();
        $SkuValueModel = new SkuValueModel();

        $insertProductId = $ProductModel->insertProduct($productInfo);

        if (!$insertProductId) {
            Notification::error('Thất bại', 'Thêm sản phẩm thất bại');
            header('location: /admin/product/add');
            exit();
        }

        $firstSku['product_id'] = $insertProductId;
        $firstSku['images'] = $new_filename;

        $firstSkuInsertId = $SkuModel->insertSku($firstSku);
        if (!$firstSkuInsertId) {
            Notification::error('Thất bại', 'Thêm SKU 1 thất bại');
            header('location: /admin/product/add');
            exit();
        }

        foreach ($firstOption['options'] as $index => $option) {
            $data['option_id'] = $option;
            $data['value_name'] = $firstOption['values'][$index];
            $data['product_id'] = $insertProductId;

            $optionValuesInsert = $OptionValueModel->insertValue($data);
            if (!$optionValuesInsert) {
                Notification::error('Thất bại', 'Thêm thuộc tính 1 thất bại');
                header('location: /admin/product/add');
                exit();
            }
            $skValuesData['sku_id'] = $firstSkuInsertId;
            $skValuesData['option_id'] = $option;
            $skValuesData['value_id'] = $optionValuesInsert;


            if (!$SkuValueModel->insertSkuValues($skValuesData)) {
                Notification::error('Thất bại', 'Lỗi khi thêm sku đầu tiên');
                header('location: /admin/product/add');
                exit();
            }
        }
        if (isset($_POST['sku'])):

            $sku = [];

            foreach ($_POST['sku'] as $index => $skuCode) {
                $sku = [];
                $sku['sku'] = $skuCode;
                $sku['price'] = (int)$_POST['price'][$index];
                $sku['quantity'] = $_POST['quantity'][$index];
                $sku['product_id'] = $insertProductId;

                $total_quantity += $sku['quantity'];

                $extension2 = strtolower(pathinfo($_FILES["image"]["name"][$index], PATHINFO_EXTENSION));
                $new_filename2 = time() . '_' . bin2hex(random_bytes(3)) . "." . $extension2;
                $target_file2 = $target_dir . $new_filename2;


                if ($extension2 !== 'jpg' && $extension2 !== 'png') {
                    Notification::error('Thất bại', 'Thêm thất bại, Hình ảnh biến thể không hợp lệ');
                    header('location: /admin/product/add');
                    exit();
                }
                if (!move_uploaded_file($_FILES["image"]["tmp_name"][$index], $target_file2)) {
                    die("Lỗi: Không thể di chuyển file vào $target_file");
                }

                $sku['images'] = $new_filename2;
                $sku_insert = $SkuModel->insertSku($sku);
                if (!$sku_insert) {
                    Notification::error('Thất bại', 'Thêm SKU thất bại');
                    header('location: /admin/product/add');
                    exit();
                } else {

                    $quantity_update = ['total_quantity' => $total_quantity];
                    if ($ProductModel->updateProduct($insertProductId, $quantity_update)) {
                        Notification::success('Thành công', 'Đã thêm sản phẩm');
                        header('location: /admin/product/add');
                        exit();
                    } else {
                        Notification::error('Thất bại', 'Thêm sản phẩm không thành công');
                        header('location: /admin/product/add');
                        exit();
                    }
                }
            }
        else:
            $quantity_update = ['total_quantity' => $total_quantity];
            if ($ProductModel->updateProduct($insertProductId, $quantity_update)) {
                Notification::success('Thành công', 'Đã thêm sản phẩm');
                header('location: /admin/product/add');
                exit();
            }
            Notification::error('Thất bại', 'Không thể cập nhật số lượng');
            header('location: /admin/product/add');
            exit();
        endif;
    }
}
