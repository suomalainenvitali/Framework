<?php

namespace Fw\Core\Component;

//Базовый класс для компонентов приложения
abstract class Base {

    public $result;
    public $id;
    public $params;
    public $template;
    public $__path;

    abstract public function executeComponent();

}