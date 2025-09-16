<?php

namespace Src\Controllers\Admin;

use Exception;
use Src\Controllers\BaseController;
use Src\Models\Admin\OrderModel;
use Src\Notifications\Notification;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class OrderController extends BaseController {

    public function refund() {
        $OrderModel = new OrderModel();
        $data = $OrderModel->findAllRefundRequest();
        echo $this->view->render('/Admin/Pages/Orders/RefundList', ['data' => $data]);
    }

    public function paymentHistory($id) {
        header('Content-Type: application/json');
    
        try {
            Stripe::setApiKey($_ENV['STRIPE_API']);
            $OrderModel = new OrderModel;
            $order = $OrderModel->findOrder($id);
    
            if (!$order || empty($order['email'])) {
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy đơn hàng hoặc email']);
                return;
            }
    
            $customers = Customer::all(['email' => $order['email']]);
    
            if (empty($customers->data)) {
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy khách hàng trên Stripe']);
                return;
            }
    
            $transactions = [];
    
            foreach ($customers->data as $customer) {
                $charges = \Stripe\Charge::all(['customer' => $customer->id]);
    
                foreach ($charges->data as $charge) {
                    $transactions[] = [
                        'transaction_id' => $charge->id,
                        'amount' => $charge->amount / 100, // Stripe lưu số tiền theo cents
                        'currency' => strtoupper($charge->currency),
                        'status' => $charge->status,
                        'created' => date('Y-m-d H:i:s', $charge->created)
                    ];
                }
            }
    
            echo json_encode(['success' => true, 'transactions' => $transactions]);
    
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }
    



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
    
        if (!in_array($orderStatus, [1, 2, 3, 4, 5, 6, 7 ,8])) {
            echo json_encode(['success' => false, 'message' => 'Trạng thái không hợp lệ']);
            return;
        }
    
        $orders = new OrderModel();
        $result = $orders->updateOrder($orderId, ['status' => $orderStatus]);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại, order id' . $orderId . ' status ' . $orderStatus] . ' result ' . $result);
        }
    }
}