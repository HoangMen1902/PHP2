<?php
namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\BrandModel;
use Src\Models\Admin\CategoryModel;

class ProductController extends BaseController {
    public function index() {

        echo $this->view->render('/Admin/Pages/Products/ProductList');
    }

    public function addPage() {
        $CategoryModel = new CategoryModel();
        $BrandModel = new BrandModel();
        echo $this->view->render('/Admin/Pages/Products/ProductAdd', ['categories' => $CategoryModel->findAllCategory(), 'brands' => $BrandModel->findAllBrands()]);
    }




}