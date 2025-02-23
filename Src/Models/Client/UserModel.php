<?php

namespace Src\Models\Client;

use PDO;
use PDOException;
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

    public function findUser(int $id): array {
        return $this->find($id);
    }

    public function findUserWithAddress(int $id) {
        try {
            $sql = "SELECT ca.* FROM {$this->table} u JOIN checkout_addresses AS ca ON ca.user_id = u.id WHERE u.id = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $record ?: [];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }
}