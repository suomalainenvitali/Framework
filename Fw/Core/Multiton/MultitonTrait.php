<?php 

namespace Fw\Core\Multiton;

//Трейт для мультитона
trait MultitonTrait {
    protected static $instances = [];

    private function __construct() {}
    private function __clone() {}
    //Инициализация и получение единственного экземпляра объекта определенного класса
    public static function getInstance(string $instance_name): mixed {
        if (empty(self::$instances[$instance_name])) static::$instances[$instance_name] = new $instance_name;

        return self::$instances[$instance_name];
    }
}