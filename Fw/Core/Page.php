<?php

namespace Fw\Core;

class Page {
    private $js = [];
    private $css = [];
    private $str = []; 
    public $properties = [];

    public function addJs(string $src) {
        $this->js[] = $src;
    }
    public function addCss(string $link) {
        $this->css[] = $link;
    }
    public function addString(string $str) {
        $this->str[] = $str;
    }

    public function showHead() {
        foreach ($this->js as $src) {
            echo  "<script async src='$src'></script>";
        }
        foreach ($this->str as $str) {
            echo $str;
        }
        foreach ($this->css as $link) {
            echo "<link href='$link' type='text/css' rel='stylesheet'>";
        }
    }

    public function setProperty(string $id, mixed $value) {
        $this->properties[$id] = $value;
    }

    public function getProperty(string $id) {
        if (isset($this->properties[$id])) return $this->properties[$id];
        
        return null;
    }

    public function showProperty(string $id) {
        if (isset($this->properties[$id])) return "#FW_PAGE_PROPERTY_{$id}#";

        return null;
    }

    public function getAllReplace() {
        $replace_array = [];

        foreach ($this->properties as $id => $value) {
            $replace_array[$this->showProperty($id)] = $value;
        }

        return $replace_array;
    }
}