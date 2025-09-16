<?php

namespace Src\Models\Client;

use Src\Models\Model;

class AddressModel extends Model {
    protected $table = 'checkout_addresses';

    public function insertAddress(array $data): int {
        return $this->insert($data);
    }

    public function deleteAddress(int $id): bool {
        return $this->delete($id);
    }
}