<?php

namespace Fw\Core;

class Page {
    //Контейнер ссылок на JS scripts
    private $js = [];
    //Контейнер ссылок на CSS files
    private $css = [];
    //Конетейнер строк
    private $str = []; 
    //Контейнер свойств
    private $properties = [];

    //Добавление ссылки скрипта в контейнер
    public function addJs(string $src): void {
        $this->js[] = $src;
    }
    //Добавление ссылки файла стилей в контейнер
    public function addCss(string $link): void {
        $this->css[] = $link;
    }
    //Добавление строки в контейнер
    public function addString(string $str): void {
        $this->str[] = $str;
    }

    //Вывод скриптов, стилей и строк из контейнеров
    public function showHead(): void {
        foreach ($this->js as $src) {
            $this->showJs($src);
        }
        foreach ($this->str as $str) {
            $this->showStr($str);
        }
        foreach ($this->css as $link) {
            $this->showCss($link);
        }
    }

    //Вывод скрипта
    public function showJs($src) {
        if (isset($src)) echo "<script async src='$src'></script>";
        else "";
    }
    //Вывод строки
    public function showStr($str) {
        if (isset($str)) echo $str;
        else "";
    }
    //Вывод стиля
    public function showCss($link) {
        if (isset($link)) echo "<link href='$link' type='text/css' rel='stylesheet'>";
        else "";
    }
    //Устанавливает свойство
    public function setProperty(string $id, mixed $value): void {
        $this->properties[$id] = $value;
    }
    //Получает свойство
    public function getProperty(string $id): string {
        return isset($this->properties[$id]) ? $this->properties[$id] : null;
    }
    //Выводит свойство
    public function showProperty(string $id): string {
        return isset($this->properties[$id]) ? "#FW_PAGE_PROPERTY_{$id}#" : null;
    }
    //Возвращает массив макросов свойств и их значения
    public function getAllReplace(): array {
        $replace_array = [];

        foreach ($this->properties as $id => $value) {
            $replace_array[$this->showProperty($id)] = $value;
        }

        return $replace_array;
    }
}