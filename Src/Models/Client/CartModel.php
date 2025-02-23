<?php

namespace Src\Models\Client;

use PDO;
use PDOException;
use Src\Models\Model;

class CartModel extends Model
{
    protected $table = 'carts';

    public function insertCart(array $data): int
    {
        return $this->insert($data);
    }

    public function findCartByUser(int $user_id)
    {
        try {
            $sql = "SELECT 
    c.id AS cart_id,
    c.user_id,
    c.quantity AS cart_quantity,
    p.id AS product_id,
    p.name AS product_name,
    p.thumbnail,
    p.brand_id,
    p.category_id,
    p.description,
    p.short_description,
    p.total_quantity,
    p.status,
    p.created_at,
    p.updated_at,
    psk.id AS sku_id,
    psk.sku,
    psk.price,
    psk.quantity AS sku_quantity,
    psk.images,
    GROUP_CONCAT(o.name, ': ', ov.value_name SEPARATOR ' | ') AS sku_options
FROM carts c
JOIN product_skus psk ON c.sku_id = psk.id
JOIN products p ON psk.product_id = p.id
LEFT JOIN sku_values sv ON sv.sku_id = psk.id
LEFT JOIN options o ON sv.option_id = o.id
LEFT JOIN option_values ov ON sv.value_id = ov.id
WHERE c.user_id = ?
GROUP BY c.id, p.id, psk.id;
";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$user_id]);
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $record ?: [];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }

    public function findCartByUserAndId(int $cart_id, int $user_id): mixed {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE `id` = ? AND user_id = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$cart_id, $user_id]);
            $record = $stmt->fetch();
            return $record ?: [];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }
    public function deleteCart(int $id): bool {
        return $this->delete($id);
    }
    
}
