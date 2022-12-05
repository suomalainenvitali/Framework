<?php

namespace Fw\Core;

class Route {
    //Запрет на клонирование объекта и создание его
    private function __construct() {}
    private function __clone() {}

    public static function route(string $url) {
        include_once __DIR__ . '/../routes.php';
        $routes = getRoutes();

        $path = parse_url($url, PHP_URL_PATH);

        foreach ($routes as $route) {
            if (preg_match($route['condition'], $path, $params)) {
                array_shift($params);        
                $url_parameters = preg_replace_callback( '/(\$[0-9]+)/', function($match) use(&$params) {
                    return array_shift($params);
                }, $route['rule']);
            }
        }
    }
}

?>

