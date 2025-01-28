<?php

namespace Src\Controllers\Client;

use Src\Controllers\BaseController;

class CheckoutController extends BaseController {
    public function checkoutPage() {
        echo $this->view->render('/Client/Pages/Checkout');
    }
}