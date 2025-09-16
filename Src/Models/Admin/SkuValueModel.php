<?php

namespace Src\Models\Admin;

use Src\Models\Model;

class SkuValueModel extends Model {
    protected $table = 'sku_values';

    public function insertSkuValues(array $data): int {
        return $this->insert($data);
    }
    public function updateSkuValue(int $id, array $data): bool {
        return $this->update($id, $data);
    }
}