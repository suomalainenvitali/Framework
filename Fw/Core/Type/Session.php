<?php

namespace Fw\Core\Type;
//Класс сессий приложения
class Session extends Dictionary {

    public function __construct() {
        parent::__construct($_SESSION, false);
    }

}