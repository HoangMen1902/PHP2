<?php

namespace Src\Controllers\Admin;

use Src\Controllers\BaseController;
use Src\Models\Admin\OrderModel;
use Src\Notifications\Notification;

class OrderController extends BaseController {
    public function getOrders($id) {
        header('Content-Type: application/json');
        $OrderModel = new OrderModel();
        $orders = $OrderModel->getOrdersByUserId($id);
        echo json_encode($orders);
    }
    public function deleteOrder($id) {
        $OrderModel = new OrderModel();
        $result = $OrderModel->deleteOrder($id);
        if($result) {
            Notification::success('Xóa thành công', 'Đã xóa đơn hàng');
            header('location: /admin/orders');
            exit();
        } else {
            Notification::error('Xóa thất bại', 'Xóa đơn hàng thất bại');
            header('location: /admin/orders');
            exit();
        }
    }
    public function index() {
        $OrderModel = new OrderModel();
        $data = $OrderModel->findAllOrder();
        echo $this->view->render('/Admin/Pages/Orders/OrdersList', ['data' => $data]);
    }
    public function changeStatus()
    {
        header('Content-Type: application/json');
        $orderId = $_POST['order_id'];
        $orderStatus = $_POST['order_status'];
    
        if (empty($orderId) || empty($orderStatus)) {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin']);
            return;
        }
    
        if (!in_array($orderStatus, [1, 2, 3, 4, 5, 6])) {
            echo json_encode(['success' => false, 'message' => 'Trạng thái không hợp lệ']);
            return;
        }
    
        $orders = new OrderModel();
        $result = $orders->updateOrder($orderId, ['status' => $orderStatus]);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại']);
        }
    }
}