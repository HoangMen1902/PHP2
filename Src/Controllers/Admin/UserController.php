<?php
namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;

class UserController extends BaseController {
    public function index() {
        echo $this->view->render('/Admin/Pages/Users/UsersList');
    }

    public function addPage() {
        echo $this->view->render('/Admin/Pages/Users/UserAdd');
    }
}