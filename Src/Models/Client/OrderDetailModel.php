<?php

namespace Src\Models\Client;

use Src\Models\Model;
class OrderDetailModel extends Model {
    protected $table = 'order_details';

    public function insertOrder(array $data): int {
        return $this->insert($data);
    }

    
}