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
}
