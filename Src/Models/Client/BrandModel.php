<?php
namespace Src\Models\Client;

use Src\Models\Model;

class BrandModel extends Model {
    protected $table = 'brands';

    public function findAllBrand():array {
        return $this->findAll();
    }
}