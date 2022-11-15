<?php 

namespace Fw\Core\Multiton;

use Fw\Core\Multiton\Interfaces\MultitonInterface;

trait MultitonTrait {
    protected static $instances = [];

    private function __construct() {}
    private function __clone() {}

    public static function getInstance(string $instance_name) {
        if (empty(self::$instances[$instance_name])) static::$instances[$instance_name] = new $instance_name;

        return self::$instances[$instance_name];
    }
}