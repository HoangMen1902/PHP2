<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;

class HomeController extends BaseController {
    public function index() {
        echo $this->view->render('/Admin/index');
    }
}