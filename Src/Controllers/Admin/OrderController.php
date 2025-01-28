<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;

class OrderController extends BaseController {
    public function index() {
        echo $this->view->render('/Admin/Pages/Orders/OrdersList');
    }
}