<?php

namespace Fw\Core;

class Config {
    private function __construct() {}
    private function __clone() {}   

    public static function get($path) {
        include_once __DIR__ . '/../config.php';
        
        $path_array = explode('/', $path);
        $config_value = getConfigs();

        foreach ($path_array as $step) {
            if(!isset($config_value[$step])) return null;
            $config_value = $config_value[$step];
        }

        return $config_value;
    }

}

?>