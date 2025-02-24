<?php

namespace Src\Models\Client;

use PDO;
use PDOException;
use Src\Models\Model;

class OrderModel extends Model
{
    protected $table = 'orders';

    public function insertOrder(array $data): int
    {
        return $this->insert($data);
    }

    public function findOrder(int $id): array
    {
        return $this->find($id);
    }

    public function getAllUserOrder(int $user_id)
    {
        try {
            $sql = "SELECT 
    o.id AS order_id,
    o.created_at,
    o.status,
    o.total_price,
    o.address,
    GROUP_CONCAT(
        JSON_OBJECT(
            'order_detail_id', od.id,
            'quantity', od.quantity,
            'order_price', od.price,
            'product_id', p.id,
            'product_name', p.name,
            'sku_id', ps.id,
            'sku_code', ps.sku,
            'sku_images', ps.images,
            'sku_price', ps.price
        )
    ) AS order_items 
FROM Orders o
JOIN Order_details od ON o.id = od.order_id
JOIN Product_skus ps ON od.sku_id = ps.id
JOIN Products p ON ps.product_id = p.id
WHERE o.user_id = ?
GROUP BY o.id;";

            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$user_id]);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records ?: [];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }
}
