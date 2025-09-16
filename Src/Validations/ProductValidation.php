<?php
namespace Src\Validations;

/**
 * Validate Product
 */

class ProductValidation extends DataValidate {
    /**
     * Phuong thuc nay de kiem tra gia tri nguoi dung nhap vao
     * @var array
     */
    public array $error = [];
    public function productValidate(array $data): array {
        foreach($data as $key => $input) {
            if(!is_array($data[$key]) && empty($input)) {
                $this->error[$key] = "$key Không được để trống";
            }

            if(is_array($data[$key])) {
                foreach($data[$key] as $value) {
                    if(empty($value)) {
                        $this->error[$key] = "$key Không được để trống";
                    }
                }
            }
        }

        return $this->error;
    }
    public function ajaxValidate(array $data): array {
        foreach($data as $key => $input) {
            if(!is_array($data[$key]) && empty($input)) {
                $this->error[] = $key;
            }

            if(is_array($data[$key])) {
                foreach($data[$key] as $value) {
                    if(empty($value)) {
                        $this->error[] = $key;
                    }
                }
            }
        }

        return $this->error;
    }
}