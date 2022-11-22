<?php

namespace Fw\Core\Validation;

//Абстрактный класс для валидации данных
abstract class Validator {
    //Правило валидации
    protected $rule = null;
    //Конструктор базового класса
    public function __construct($rule) {
        $this->rule = $rule;
    }
    //Метод проверки валидации, принимает значение поля
    abstract function validate($value): bool;
}