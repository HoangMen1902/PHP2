<?php

namespace Src\Models\Admin;

use PDO;
use PDOException;
use Src\Models\Model;

class BrandModel extends Model
{
    protected $table = 'brands';

    public function   insertBrand(array $data): int
    {
        return $this->insert($data);
    }

    public function findAllBrands(): array
    {
        return $this->findAll();
    }

    public function findOneBrand(int $id): array
    {
        return $this->find($id);
    }

    public function findExistedBrand(string $name): array
    {
        return $this->findSpecific('name', $name);
    }

    public function updateBrand(int $id, array $data): int
    {
        return $this->update($id, $data);
    }

    public function deleteBrand(int $id): bool
    {
        return $this->delete($id);
    }
    public function countBrands(): int
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM 1this->table";
            $stmt = $this->database->getConnection()->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $result['total'];
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn database: " . $e->getMessage());
            return 0;
        }
    }
}
