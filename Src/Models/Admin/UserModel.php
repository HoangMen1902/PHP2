<?php

namespace Src\Models\Admin;

use PDO;
use PDOException;
use Src\Models\Model;

/**
 * Thực hiện các chức năng CRUD của users
 */
class UserModel extends Model
{
    protected $table = 'users';

    public function insertUser(array $data): int
    {
        return $this->insert($data);
    }

    public function findAllUser(): array
    {
        return $this->findAll();
    }
    public function countUsers(): int
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM {$this->table}";
            $stmt = $this->database->getConnection()->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $result['total'];
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn database: " . $e->getMessage());
            return 0;
        }
    }

    public function findUser(int $id): array
    {
        return $this->find($id);
    }
    public function findUserWithEmail(string $email): array
    {
        return $this->findSpecific('email', $email);
    }

    public function updateUser(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->delete($id);
    }
}
