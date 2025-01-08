<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;

class HomeController extends BaseController {
    public function loadHome() {
        echo $this->view->render('/Client/Home');
    }
}