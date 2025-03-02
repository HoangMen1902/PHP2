<?php

namespace Src\Models\Admin;

use Src\Models\Model;

class SkuModel extends Model {
    protected $table = 'product_skus';

    public function insertSku(array $data):int {
        return $this->insert($data);
    }

    public function deleteSku(int $id): bool {
        return $this->delete($id);
    }

    public function updateSku(int $id, array $data): bool {
        return $this->update($id, $data);
    }
}