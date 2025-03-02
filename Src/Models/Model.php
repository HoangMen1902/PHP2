<?php

namespace Src\Models;

use PDO;
use PDOException;
use Exception;
use Src\Models\Database;
use Symfony\Component\VarDumper\VarDumper;

class Model
{
    protected $table = "";

    protected $errors = [];


    protected Database $database;

    public function __construct()
    {
        $this->database = new Database($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME'], $_ENV['DB_PORT']);

        // dòng này chỉ dùng để test coi nó chạy không? chứ không có tác dụng kết nối db để truy vấn dữ liệu
        $this->database->getConnection();
    }

    private function getTable()
    {
        return $this->table;
    }


    public function find(int $id): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE `id` = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            $record = $stmt->fetch();
            return $record ?: [];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }

    public function findSpecific(string $column, mixed $value): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE {$column} = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$value]);
            $record = $stmt->fetch();
            return $record ?: [];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }

    public function findAll(): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} ";

            $result = $this->database->getConnection()->query($sql);
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }


    protected function validate(array $data): void
    {
        if (empty($data)) {
            $this->addErrors("data", "Name is required");
        }
    }

    protected function addErrors(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }


    public function getErrors(): array
    {
        return $this->errors;
    }


    public function insert(array $data): int
    {
        try {
            $this->validate($data);
            if (!empty($this->errors)) {
                return 0; // Trả về 0 nếu validation thất bại
            }

            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
            $conn = $this->database->getConnection();
            $stmt = $conn->prepare($sql);

            foreach ($data as $key => $value) {
                $type = match (gettype($value)) {
                    "integer" => PDO::PARAM_INT,
                    "boolean" => PDO::PARAM_BOOL,
                    "NULL" => PDO::PARAM_NULL,
                    default => PDO::PARAM_STR
                };
                $stmt->bindValue(":$key", $value, $type);
            }

            $stmt->execute();
            // Lấy ID của bản ghi vừa được chèn
            //lastInsertId sẽ thực thi ngay sau khi mình thực thi câu truy vấn INSERT INTO
            return (int)$conn->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi chèn dữ liệu vào bảng {$this->table}: " . $e->getMessage());
        }
    }


    public function update(int $id, array $data): bool
    {
        try {
            $this->validate($data);

            if (!empty($this->errors)) {
                return false;
            }

            unset($data["id"]); // Loại bỏ id khỏi dữ liệu cập nhật

            $assignment = array_map(fn($key) => "$key = ?", array_keys($data));

            $sql = "UPDATE {$this->getTable()} SET " . implode(", ", $assignment) . " WHERE id = ?";

            $conn = $this->database->getConnection();
            $stmt = $conn->prepare($sql);

            $i = 1;
            foreach ($data as $value) {
                $type = match (gettype($value)) {
                    "integer" => PDO::PARAM_INT,
                    "boolean" => PDO::PARAM_BOOL,
                    "NULL" => PDO::PARAM_NULL,
                    default => PDO::PARAM_STR
                };
                $stmt->bindValue($i++, $value, $type);
            }

            $stmt->bindValue($i, $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi cập nhật dữ liệu trong bảng {$this->getTable()}: " . $e->getMessage());
        }
    }


    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $conn = $this->database->getConnection();
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Không thể chuẩn bị truy vấn DELETE.");
            }

            $stmt->bindValue(1, $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi xóa dữ liệu: " . $e->getMessage());
        }
    }


    public function getInsertID(): string
    {
        try {
            $conn = $this->database->getConnection();
            $lastInsertId = $conn->lastInsertId();
            if (!$lastInsertId) {
                throw new Exception("Không thể lấy ID của bản ghi vừa được chèn.");
            }
            return $lastInsertId;
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi lấy ID bản ghi mới: " . $e->getMessage());
        }
    }
}
