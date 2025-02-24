<?php

namespace Src\Models\Admin;

use PDO;
use PDOException;
use Src\Models\Model;

class OrderModel extends Model
{
    protected $table = 'orders';

    public function getOrdersByUserId(int $user_id): array
    {
        try {
            $sql = "
                SELECT 
                    o.id, 
                    p.name AS product_name, 
                    o.phone, 
                    o.address, 
                    o.total_price, 
                    o.status 
                FROM orders o 
                JOIN order_details dt ON dt.order_id = o.id 
                    AND dt.id = (SELECT MIN(dt2.id) FROM order_details dt2 WHERE dt2.order_id = o.id)
                JOIN product_skus psk ON dt.sku_id = psk.id 
                JOIN products p ON psk.product_id = p.id 
                WHERE o.user_id = ?;
            ";
    
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }

    public function findAllOrder(): array
    {
        try {
            $sql = "
            SELECT 
    o.id, 
    p.name AS product_name, 
    o.phone, 
    o.address, 
    o.total_price, 
    o.status 
FROM orders o 
JOIN order_details dt ON dt.order_id = o.id 
    AND dt.id = (SELECT MIN(dt2.id) FROM order_details dt2 WHERE dt2.order_id = o.id)
JOIN product_skus psk ON dt.sku_id = psk.id 
JOIN products p ON psk.product_id = p.id;

";

            $result = $this->database->getConnection()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        };
    }
    public function updateOrder(int $id, array $data): bool
    {
        error_log("Cập nhật order ID: $id, Dữ liệu: " . print_r($data, true));

        return $this->update($id, $data);
    }
    public function deleteOrder(int $id): bool
    {
        return $this->delete($id);
    }
}
