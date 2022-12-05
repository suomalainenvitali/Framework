<?php

class Autoloader {

    public static function getLoader() {
        spl_autoload_register([
            'Autoloader', 'loadClass'
        ], true, true);
    }

    public static function loadClass($class) {
        $path = self::buildPath($class);

        if (file_exists($path)) {
            require_once $path;
        }
    }

    public static function buildPath($class) {
        $pathParts = explode('\\', $class);

        if (count($pathParts) < 2) return null;        

        return sprintf(
            '%s.php',
            implode(DIRECTORY_SEPARATOR, $pathParts)
        );
    }
}