<?php

namespace Fw\Core\Validation\Validators;

//Класс проверки номера телефона на соответствие регулярному выражению
class Phone extends RegExp {
    public function __construct() {
        $this->rule = "#^(\+|00)[0-9]{1,3}[0-9]{4,14}$#";
    }
}