<?php

namespace Src\Models\Client;

use PDO;
use PDOException;
use Src\Models\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    public function findAllProduct(): array
    {
        return $this->findAll();
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

    public function findOneProductWithSku(int $id): array
    {
        try {
            $sql = "SELECT p.*, p.id AS product_id, ps.*, ps.id AS sku_id 
                    FROM {$this->table} p 
                    JOIN product_skus ps ON p.id = ps.product_id 
                    WHERE p.id = ?";

            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }

    public function findProduct(int $id): array
    {
        return $this->find($id);
    }
}
