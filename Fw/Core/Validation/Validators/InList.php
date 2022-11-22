<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

//Класс валидации соответствия нахождению значения в списке
class InList extends Validator {
    public function validate($value): bool {
        return in_array($value, $this->rule);
    }
}
