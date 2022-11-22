<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

//Класс валидации соответствия значения максимальной длинне. Работает со строками и массивами.
class MaxLength extends Validator {

    public function validate($value): bool {
        $result = false; 
        
        switch(gettype($value)) {
            case "string":
                if (mb_strlen($value) <= $this->rule) $result = true;
                break;
            case "array":
                if (count($value) <= $this->rule) $result = true;
                break;
        }
        

        return $result;
    }
}