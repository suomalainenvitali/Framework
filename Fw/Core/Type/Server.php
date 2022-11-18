<?php

namespace Fw\Core\Type;
//Класс серверной информации приложения
class Server extends Dictionary {

    public function __construct() {
        parent::__construct($_SERVER, true);
    }

}