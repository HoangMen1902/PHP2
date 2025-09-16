<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\BrandModel;
use Src\Models\Admin\CategoryModel;
use Src\Models\Admin\OrderModel;
use Src\Models\Admin\UserModel;
use Src\Models\Admin\ProductModel;

class HomeController extends BaseController {
    public function index() {
        $UserModel = new UserModel();
        $user = $UserModel->countUsers();
        $CategoryModel = new CategoryModel();
        $category = $CategoryModel->countCategory();
        $BrandModel = new BrandModel();
        $brand = $BrandModel->countBrands();
        $ProductModel = new ProductModel();
        $products = $ProductModel->countProduct();
        $OrderModel = new OrderModel();
        $orders = $OrderModel->countOrders();
        
        echo $this->view->render('/Admin/index', ['user' => $user, 'category' => $category, 'brand' => $brand, 'product' => $products, 'order' => $orders]);
    }
}