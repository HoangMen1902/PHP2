<?php

namespace Src\Controllers\Client;


use Src\Controllers\BaseController;
use Src\Models\Client\CartModel;
use Src\Notifications\Notification;

class CartController extends BaseController {
    public function loadCart() {
        if(!isset($_SESSION['user'])) {
            Notification::error('Không thể truy cập', 'Vui lòng đăng nhập');
            header('location: /dang-nhap');
            exit();
        }

        $CartModel = new CartModel();
        $data = $CartModel->findCartByUser($_SESSION['user']['id']);
        echo $this->view->render('/Client/Pages/Cart', ['data' => $data]);
    }

    public function addToCart() {
        if(!isset($_SESSION['user']))  {
            Notification::error('Thất bại', 'Vui lòng đăng nhập');
            header('location: /dang-nhap');
            exit();
        }       

        $CartModel = new CartModel;
        $data = $_POST;
        $data['user_id'] = $_SESSION['user']['id'];
        $result = $CartModel->insertCart($data);
        if(!$result) {
            Notification::error('Thất bại', 'Có lỗi đã xảy ra, xin vui lòng kiểm tra');
            header('location: /san-pham');
            exit();
        } else {
            Notification::success('Thành công', 'Đã thêm vào giỏ hàng');
            header('location: /gio-hang');
            exit();
        }



    }

    public function deleteCart() {
        header("Content-Type: application/json");
    
        $data = json_decode(file_get_contents("php://input"), true);
        $cart_id = isset($data['cart_id']) ? intval($data['cart_id']) : 0;
        $user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    
        if (!$cart_id || !$user_id) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ!']);
            exit();
        }
    
        $CartModel = new CartModel();
        $checkUserCart = $CartModel->findCartByUserAndId($cart_id, $user_id);
    
        if (!$checkUserCart) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
            exit();
        }
    
        $deleteResult = $CartModel->deleteCart($cart_id);
        if ($deleteResult) {
            echo json_encode(['success' => true, 'message' => 'Xóa giỏ hàng thành công!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Lỗi khi xóa giỏ hàng!']);
        }
        exit();
    }
}