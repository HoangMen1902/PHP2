<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;

class HomeController extends BaseController {
    public function loadHome() {
        echo $this->view->render('/Client/Home');
    }

    public function loadContact() {
        echo $this->view->render('/Client/Pages/Contact');
    }
    public function loadAbout() {
        echo $this->view->render('/Client/Pages/About');
    }
}