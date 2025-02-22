<?php

namespace Src\Validations;

class DataValidate {

    public array $error = [];
    public function __invoke(array $data, array $exceptions = []) {
        foreach($data as $key => $input) {
            if (in_array($key, $exceptions, true)) {
                continue;
            }
            if (empty($input)) {
                $this->error[$key] = "$key không được để trống";
            }
        }
        return $this->error;
    }
}