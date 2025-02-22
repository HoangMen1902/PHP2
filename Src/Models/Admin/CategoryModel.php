<?php
namespace Src\Models\Admin;

use Src\Models\Model;


class CategoryModel extends Model {
    protected $table = 'categories';

    public function insertCategory(array $data): int {
        return $this->insert($data);
    }

    public function findExistedCategory(string $name): array {
        return $this->findSpecific('name', $name);
    }

    public function findAllCategory(): array {
        return $this->findAll();
    }

    public function findCategory(int $id): array {
        return $this->find($id);
    } 
    public function updateCategory(int $id, array $data): bool {
        return $this->update($id, $data);
    }

    public function deleteCategory(int $id) {
        return $this->delete($id);
    }
}