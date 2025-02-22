<?php
namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;

class ProductController extends BaseController {
    public function index() {
        echo $this->view->render('/Admin/Pages/Products/ProductList');
    }

    public function addPage() {
        echo $this->view->render('/Admin/Pages/Products/ProductAdd');
    }




}