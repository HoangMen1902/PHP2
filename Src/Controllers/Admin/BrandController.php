<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController; 
class   BrandController extends BaseController {
    public function index() {
        echo $this->view->render('/Admin/Pages/Brands/BrandsList');
    }
    

    public function addPage() {
        echo $this->view->render('/Admin/Pages/Brands/BrandAdd');
    }
}