<?php

namespace Src\Controllers\Client;

use Src\Controllers\BaseController;
use Src\Models\Client\CartModel;
use Src\Notifications\Notification;

class CheckoutController extends BaseController {
    public function checkoutPage() {
        if(!isset($_SESSION['user'])) {
            Notification::error('Vui lòng đăng nhập', 'Vui lòng đăng nhập trước khi thanh toán');
            header('location: /dang-nhap');
            exit();
        } 

        $CartModel = new CartModel();
        $userCart = $CartModel->findCartByUser($_SESSION['user']['id']);
        if(!$userCart && !isset($userCart) && empty($userCart)) {
            Notification::error('Thất bại', 'Vui lòng chọn mặt hàng cần mua');
            header('location: /san-pham');
            exit();
        }

        echo $this->view->render('/Client/Pages/Checkout');
    }
}