<?php

namespace Fw\Core;

//Класс для работы с конфигами
class Config {
    private function __construct() {}
    private function __clone() {}   
    //Метод получения значения конфига по пути
    public static function get(string $path): mixed {
        //Подключение файла с массивом конфигов по пути
        include_once __DIR__ . '/../config.php';
        //Разбиение строки пути на ступени
        $path_array = explode('/', $path);
        //Получение массива конфигов
        $config_value = getConfigs();
        //Поиск в массиве конфигов значение необходимого
        foreach ($path_array as $step) {
            if(!isset($config_value[$step])) return null;
            $config_value = $config_value[$step];
        }

        return $config_value;
    }

}

?>