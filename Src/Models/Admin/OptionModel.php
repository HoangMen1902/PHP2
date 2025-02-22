<?php

namespace Src\Models\Admin;

use Src\Models\Model;

class OptionModel extends Model {
    protected $table = 'options';

    public function findExistedOption(string $name): array {
        return $this->findSpecific('name', $name);
    }

    public function insertOption(array $data): int  {
        return $this->insert($data);
    }

    public function findAllOptions(): array {
        return $this->findAll();
    }

    public function findOneOption(int $id): array {
        return $this->find($id);
    }

    public function updateOption(int $id, array $data): bool {
        return $this->update($id, $data);
    }

    public function deleteOption(int $id):bool {
        return $this->delete($id);
    }
}