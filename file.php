<?php

trait MyTrait {
    private $a = 2;

    public function __construct() {
        $this->a = 10;
    }

    public function getA() {
        return $this->a;
    }
}

class MyClass {
    use MyTrait {
        MyTrait::__construct as __trait_construct;
    }

    public function __construct()
    {
        $this->a = 5;
        $this->__trait_construct();
    }
}

$obj = new MyClass();

echo $obj->getA();