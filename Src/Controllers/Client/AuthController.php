<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;

class AuthController extends BaseController {
    public function loadLogin() {
        echo $this->view->render('/Client/Pages/Login');
    }
    public function loadRegister() {
        echo $this->view->render('/Client/Pages/Register');
    }

    public function loadProfile() {
        echo $this->view->render('/Client/Pages/User');
    }
}