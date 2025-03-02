<?php

namespace Src\Controllers\Client;

use Exception;
use Src\Controllers\BaseController;
use Src\Models\Client\CartModel;
use Src\Models\Client\OrderDetailModel;
use Src\Models\Client\OrderModel;
use Src\Models\Client\UserModel;
use Src\Notifications\Notification;
use Src\Validations\DataValidate;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends BaseController {

    public function thanksPage($id, $method) {
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->findOrder($id);

        if(empty($OrderData)) {
            header('location: /home');
            exit();
        }

        if(!$OrderData && empty($OrderData) && $OrderData['user_id'] != $_SESSION['user']['id']) {
            header('location: /home');
            exit();
        }
        echo $this->view->render('Client/Pages/CheckoutComplete', ['data' => $OrderData, 'method' => $method]);
    }
    public function checkoutComplete($id, $address, $phone) {
        $address = urldecode($address);
        Stripe::setApiKey($_ENV['STRIPE_API']);
        $data = session::retrieve($id);
        $total = $data->amount_total;
        $user_id = $_SESSION['user']['id'];

        $insertOrder = [
            'user_id' => $user_id,
            'address' => $address,
            'total_price' => $total,
            'status' => 3,
            'phone' => $phone
        ];

        $OrderModel = new OrderModel;
        $OrderDetailModel = new OrderDetailModel;
        $CartModel = new CartModel();
        $result = $OrderModel->insertOrder($insertOrder);
        $CartQuery = $CartModel->findCartByUser($user_id);
        if ($result === false) {
            Notification::error('Đặt hàng thất bại', 'Đã xảy ra lỗi trong quá trình đặt hàng');
            header('location: /gio-hang');
            exit();
        }
        $orderDetailInsert = [];

        foreach ($CartQuery as $cartItem) {
            $price = $cartItem['cart_quantity'] * $cartItem['price'];
            $orderDetailInsert[] = [
                'order_id' => $result,
                'sku_id' => $cartItem['sku_id'],
                'price' => $price,
                'quantity' => $cartItem['cart_quantity']
            ];
        }
        $lastResult = [];
        foreach ($orderDetailInsert as $index => $dataInsert) {
            $lastResult[] = $OrderDetailModel->insertOrder($dataInsert);
            
            if ($lastResult[$index] === false) {
                Notification::error('Tạo đơn hàng thất bại', 'Tạo đơn hàng thất bại, vui lòng báo cáo với quản trị viên');
                header('location: /checkout');
                exit();
            }
        }
        Notification::success('Đã đặt hàng', 'Bạn đã đặt hàng thành công');
        $CartModel->deleteAllUserCart($user_id);
        header("location: /cam-on/$result/international");
        exit();
    }
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
        $UserModel = new UserModel();
        $userAddress = $UserModel->findUserWithAddress($_SESSION['user']['id']);
        echo $this->view->render('/Client/Pages/Checkout', ['data' => $userCart, 'address' => $userAddress]);
    }
    



    public function checkOut() {
        if (!isset($_POST['payment-method'])) {
            Notification::error('Thanh toán thất bại', 'Vui lòng chọn phương thức thanh toán');
            header('location: /thanh-toan');
            exit();
        }

        $DataValidate = new DataValidate();
        $DataValidation = $DataValidate($_POST);
        if(!empty($DataValidation)) {
            Notification::error('Thất bại', 'Vui lòng nhập đầy đủ thông tin');
            header('location: /thanh-toan');
            exit();
        }
        $method = $_POST['payment-method'];
        $CartModel = new CartModel();
        if ($method === 'international') {

            try {
                $UserCart = $CartModel->findCartByUser($_SESSION['user']['id']);

                $lineItems = array_map(function ($products) {
                    $price = $products['price'] ;
                    return [
                        'price_data' => [
                            'currency' => 'VND',
                            'product_data' => [
                                'name' => $products['product_name'],
                                'description' => $products['sku_id'],
                            ],
                            'unit_amount' => $price,
                        ],
                        'quantity' => $products['cart_quantity']
                    ];
                }, $UserCart);

                $additionalData['address'] = $_POST['address'] . ' ' . $_POST['ward'] . ' ' . $_POST['district'] . ' ' . $_POST['province'] . ' ' . $_POST['phone'];
                $phone = $_POST['phone'];
    
                $this->createCheckoutSession($lineItems, $additionalData, $phone);
    

            } catch (Exception $e) {
                error_log('Lỗi khi thanh toán bằng visa: ' . $e->getMessage());
                Notification::error('Checkout thất bại', 'Có lỗi xảy ra trong quá trình thanh toán.');
                header('location: /checkout');
                exit();
            }
        }
    }
    
    public function createCheckoutSession($lineItems, $additionalData, $phone)
    {
        try {
            header('Content-Type: application/json');

            $address = urlencode($additionalData['address']);

            Stripe::setApiKey($_ENV['STRIPE_API']);
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => $_ENV['APP_URL'] . "/international-success/{CHECKOUT_SESSION_ID}/$address/$phone",
                'cancel_url' => $_ENV['APP_URL'] . '/international-cancel',
            ]);
            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);
        } catch (Exception $e) {
            error_log('Đã xảy ra lỗi khi thanh toán bằng Visa: ' . $e->getMessage());
            Notification::error('Đã xảy ra lỗi', 'Hiện đang gặp trục trặc với phương thức này');
            header('location: /checkout');
            exit();
        }
    }
}