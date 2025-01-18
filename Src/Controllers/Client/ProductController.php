<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;

class ProductController extends BaseController {

    public function loadProducts() {
        echo $this->view->render('/Client/Pages/Products');
    }
    public function loadDetail() {
        echo $this->view->render('/Client/Pages/Detail');
    }
}