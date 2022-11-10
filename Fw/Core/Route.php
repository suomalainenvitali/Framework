<?php

namespace Fw\Core;

class Route {
    //Запрет на клонирование объекта и создание его
    private function __construct() {}
    private function __clone() {}

    //Массив маршрутов
    private static $routes = [
        [
            'condition' => '#^/news/([0-9]+)/([0-9]+)/#',
            'rule' => 'sid=$1&id=$2',
            'path' => '/news/index.php'
        ]
    ];

    //Поиск нужного маршрута из массивов
    public static function route($url) {
        //Отделение пути от url
        $path = parse_url($url, PHP_URL_PATH);

        //Перебор всех маршрутов
        foreach (self::$routes as $route) {
            //Проверка пути на соответствие условию маршрута
            if (preg_match($route['condition'], $path, $params)) {
                //удаление пути из найденных совпадений регулярного выражения
                array_shift($params);        
                //формирование строки параметров url на основании правила маршрута
                $url_parameters = preg_replace_callback( '/(\$[0-9]+)/', function($match) use(&$params) {
                    return array_shift($params);
                }, $route['rule']);
            }
        }
    }
}

?>

