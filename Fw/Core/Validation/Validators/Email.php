<?php

namespace Fw\Core\Validation\Validators;

//Класс проверки почтового адреса на соответствие регулярному выражению
class Email extends RegExp {
    public function __construct() {
        $this->rule = "#^[\w]{1}[\w\-\.]*@[\w\-]+\.[a-z]{2,4}$#i";
    }
}