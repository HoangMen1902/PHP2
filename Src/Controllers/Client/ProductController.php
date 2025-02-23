<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;
use Src\Models\Client\ProductModel;

class ProductController extends BaseController {

    public function loadProducts() {
        $ProductModel = new ProductModel();
        $data = $ProductModel->findAllProductWithSku();
        echo $this->view->render('/Client/Pages/Products', ['data' => $data]);
    }
    public function loadDetail($id) {
        $ProductModel = new ProductModel();
        $data = $ProductModel->findOneProductWithSku($id);
        if(empty($data)) {
            header('location: /san-pham');
            exit();
        }
        echo $this->view->render('/Client/Pages/Detail', ['data' => $data]);
    }
}