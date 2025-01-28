<?php

namespace  Src\Controllers\Admin;

use Src\Controllers\BaseController;

class CategoryController extends BaseController {
    public function index() {
        echo $this->view->render('/Admin/Pages/Category/CategoryList');
    }

    public function categoryAdd() {
        echo $this->view->render ('/Admin/Pages/Category/CategoryAdd');
    }
}