<?php

namespace Src\Models\Admin;

use Src\Models\Model;

/**
 * Thực hiện các chức năng CRUD của users
 */
class UserModel extends Model {
    protected $table = 'users';

    public function insertUser(array $data): int {
        return $this->insert($data);
    }

    public function findAllUser(): array {
        return $this->findAll();
    }

    public function findUser(int $id): array {
        return $this->find($id);
    }
    public function findUserWithEmail(string $email): array {
        return $this->findSpecific('email', $email);
    }

    public function updateUser(int $id, array $data): bool {
        return $this->update($id, $data);
    }
}