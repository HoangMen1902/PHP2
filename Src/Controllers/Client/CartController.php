<?php

namespace Src\Controllers\Client;

use Src\Controllers\BaseController; 

class CartController extends BaseController {
    public function loadCart() {
        echo $this->view->render('/Client/Pages/Cart');
    }
}