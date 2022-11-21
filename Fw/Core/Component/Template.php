<?php

namespace Fw\Core\Component;

use Fw\Core\Application;
use Fw\Core\Multiton\Multiton;
//Класс шаблона приложения
class Template {
    private $__path;
    private $__relative_path;
    private $id;
    private $component;

    //метод отображения шаблона компонента
    public function render(string $page="template") {
        //Получение путей до файлов шаблона
        $result_modifier = $this->__path . "result_modifier.php";
        $template = $this->__path . $page . ".php";
        $component_epilog = $this->__path . "component_epilog.php";
        $style = $this->__path . "style.css";
        $script = $this->__path . "script.js";

        //Подключение php файлов шаблона
        if (file_exists($result_modifier)) include $result_modifier;

        if (file_exists($template)) include $template;

        if (file_exists($component_epilog)) include $component_epilog;

        $app = Multiton::getInstance(Application::class);
        $pager = $app->getPager();

        //Подключение файлов стилей в приложение
        if (file_exists($style)) $pager->addCss(str_replace($this->__path, $this->__relative_path, $style));

        if (file_exists($script)) $pager->addJs(str_replace($this->__path, $this->__relative_path, $script));
    }

    //Конструктор класса
    public function __construct(string $id, Base $component) {
        $this->id = $id;
        $this->component = $component;
    }
    //Получение пути шаблона
    public function getPath() {
        return $this->__path;
    }
    //Установка пути шаблона
    public function setPath(string $value){
        $this->__path = $value;
    }
    //Получение относительного пути шаблона
    public function getRelativePath() {
        return $this->__relative_path;
    }
    //Установка относительного пути шаблона
    public function setRelativePath(string $value){
        $this->__relative_path = $value;
    }
}