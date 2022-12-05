<?php
//Класс автозагрузчик неймспейсов
class Autoloader {
    //Метод подключающий автозагруску неймспейсов
    public static function getLoader() {
        spl_autoload_register([
            'Autoloader', 'loadClass'
        ], true, true);
    }

    //Метод подключающий файл класса
    public static function loadClass(string $class): void {
        $path = self::buildPath($class);

        if (file_exists(__DIR__ . "/" . $path)) {
            require_once $path;
        }
    }

    //Метод построения пути к классу
    public static function buildPath(string $class): string {
        $class = str_replace("Fw\\", "", $class);

        $path_parts = explode('\\', $class);

        if (count($path_parts) < 2) return null;        

        return sprintf(
            '%s.php',
            implode(DIRECTORY_SEPARATOR, $path_parts)
        );
    }
}