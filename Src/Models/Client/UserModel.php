<?php

namespace Src\Models\Client;

use Src\Models\Model;

class UserModel extends Model {
    protected $table = 'users';

    public function insertUser(array $data):int {
        return $this->insert($data);
    }

    public function findExistedUser(string $email): array {
        return $this->findSpecific('email', $email);
    }

    public function updateUser(int $id,array $data): bool {
        return $this->update($id, $data);
    }

    public function findUser(int $id) {
        return $this->find($id);
    }
}