<?php

namespace Src\Models\Admin;

use Src\Models\Model;


class OptionValueModel extends Model {
    protected $table = 'option_values';

    public function insertValue(array $data):int {
        return $this->insert($data);
    }
}