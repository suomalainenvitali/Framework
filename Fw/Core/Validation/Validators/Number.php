<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

//Класс валидации соответствия значения числу.
class Number extends Validator {

    public function __construct() {}

    public function validate($value): bool {
        return is_numeric($value);
    }
}

