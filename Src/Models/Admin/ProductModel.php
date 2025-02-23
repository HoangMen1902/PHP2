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

    public function findAllProduct(): array {
        return $this->findAll();

    }

    public function updateProduct(int $id,array $data): bool {
        return $this->update($id, $data);
    }
}
