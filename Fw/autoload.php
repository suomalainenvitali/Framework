<?php

class Autoloader {

    public static function getLoader() {
        spl_autoload_register([
            'Autoloader', 'loadClass'
        ], true, true);
    }

    public static function loadClass(string $class) {
        $path = self::buildPath($class);

        if (file_exists(__DIR__ . "/" . $path)) {
            require_once $path;
        }
    }

    public static function buildPath(string $class) {

        $class = str_replace("Fw\\", "", $class);

        $path_parts = explode('\\', $class);

        if (count($path_parts) < 2) return null;        

        return sprintf(
            '%s.php',
            implode(DIRECTORY_SEPARATOR, $path_parts)
        );
    }
}