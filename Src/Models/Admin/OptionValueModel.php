<?php

namespace Src\Models\Admin;

use Src\Models\Model;


class OptionValueModel extends Model {
    protected $table = 'option_values';

    public function insertValue(array $data):int {
        return $this->insert($data);
    }


    public function deleteValue(int $id): bool {
        return $this->delete($id);
    }


    public function updateValue(int $id, array $data): bool {
        return $this->update($id, $data);
    }
}