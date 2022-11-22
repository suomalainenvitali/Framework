<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

//Класс валидации соответствия значения минимальной длинне. Работает со строками и массивами.
class MinLength extends Validator {

    public function validate($value): bool {
        $validate = false; 
        
        switch(gettype($value)) {
            case "string":
                if (mb_strlen($value) >= $this->rule) $validate = true;
                break;
            case "array":
                if (count($value) >= $this->rule) $validate = true;
                break;
        }
        

        return $validate;
    }
}

