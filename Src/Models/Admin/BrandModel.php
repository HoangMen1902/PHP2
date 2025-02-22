<?php

namespace Src\Models\Admin;

use Src\Models\Model;

class BrandModel extends Model {
    protected $table = 'brands';

    public function   insertBrand(array $data): int {
        return $this->insert($data);
    }

    public function findAllBrands(): array {
        return $this->findAll();
    }

    public function findOneBrand(int $id): array {
        return $this->find($id);
    }

    public function findExistedBrand(string $name): array {
        return $this->findSpecific('name', $name);
    }

    public function updateBrand(int $id, array $data): int {
        return $this->update($id, $data);
    }

    public function deleteBrand(int $id):bool {
        return $this->delete($id);
    }
}