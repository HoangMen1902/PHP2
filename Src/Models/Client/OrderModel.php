<?php

namespace Src\Models\Client;

use Src\Models\Model;
class OrderModel extends Model {
    protected $table = 'orders';

    public function insertOrder(array $data): int {
        return $this->insert($data);
    }

    public function findOrder(int $id): array {
        return $this->find($id);
    }

    
}