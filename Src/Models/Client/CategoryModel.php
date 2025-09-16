<?php

namespace Src\Models\Client;

use Src\Models\Model;

class CategoryModel extends Model {
    protected $table = 'categories';

    public function findAllCategory() {
        return $this->findAll();
    }
}