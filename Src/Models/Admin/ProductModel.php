<?php

namespace Src\Models\Admin;

use Src\Models\Model;
use Pdo;
use PDOException;

class ProductModel extends Model
{
    protected $table = 'products';

    public function insertProduct(array $data): int
    {
        return $this->insert($data);
    }

    public function findAllProduct(): array
    {
        return $this->findAll();
    }

    public function findProduct($id): array
    {
        return $this->find($id);
    }
    public function updateProduct(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function findAllProductWithSku(): array
    {
        try {
            $sql = "SELECT p.*, ps.*
FROM products p
JOIN product_skus ps 
    ON ps.id = (
        SELECT ps_inner.id 
        FROM product_skus ps_inner
        WHERE ps_inner.product_id = p.id
        ORDER BY ps_inner.price ASC, ps_inner.id ASC
        LIMIT 1
    )
WHERE p.status = 1;
";

            $result = $this->database->getConnection()->query($sql);
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }



    public function findOneProductWithSku(int $id, string $order = 'ASC'): array
    {
        try {
            $sql = "SELECT 
            ps.sku AS sku_name,
            p.*, 
            p.id AS product_id, 
            ps.*, 
            ps.id AS sku_id, 
            GROUP_CONCAT(DISTINCT skv.id ORDER BY skv.id SEPARATOR ', ') AS sku_value_ids, 
            GROUP_CONCAT(DISTINCT o.id ORDER BY o.id SEPARATOR ', ') AS option_ids, 
            GROUP_CONCAT(DISTINCT o.name ORDER BY o.name SEPARATOR ', ') AS option_names, 
            GROUP_CONCAT(DISTINCT ovs.id ORDER BY ovs.id SEPARATOR ', ') AS value_ids, 
            GROUP_CONCAT(DISTINCT ovs.value_name ORDER BY ovs.value_name SEPARATOR ', ') AS value_names 
        FROM {$this->table} p
        JOIN product_skus ps ON p.id = ps.product_id 
        JOIN sku_values skv ON skv.sku_id = ps.id 
        JOIN option_values ovs ON ovs.id = skv.value_id
        JOIN options o ON o.id = skv.option_id
        WHERE p.id = ?
        GROUP BY ps.id
        ORDER BY ps.id $order;";

            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }


}
