<?php

namespace Fw\Core\Type;
//Класс словарь
class Dictionary implements \IteratorAggregate, \ArrayAccess, \Countable, \JsonSerializable {
    //Контейнер значений
    private $container = [];
    //Флаг на запись значений
    private $readonly;
    //Конструктор класса
    public function __construct(array $values, bool $readonly = false) {
        $this->setValues($values);
        $this->readonly = $readonly;
    }
    //Получение значения по ключу из контейнера
    public function get(string $name): mixed {
        isset($this->container[$name]) ? $this->container[$name] : null;
    }
    //Установка значения в контейнере по ключу
    public function set(string $name, mixed $value): void {
        if($this->readonly) return;

        if (is_null($name)) {
            $this->container[] = $value;
        } else {
            $this->container[$name] = $value;
        }
    }
    //Получение массива всех значений
    public function getValues(): array {
        return $this->container;
    }
    //Заполнение значений контейнера из массива
    public function setValues(array $values): void {
        if($this->readonly) return;

        $this->container = array_merge($this->container, $values);
    }
    //Очистка контейнера
    public function clear() {
        if($this->readonly) return;

        $this->container = [];
    }

    /*
        IteratorAggregate
    */
    public function getIterator(): \Traversable {
        return new \ArrayIterator($this);
    }

    /*
        ArrayAccess
    */
    public function offsetGet(mixed $offset): mixed {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetSet(mixed $offset, mixed $value): void {
        if($this->readonly) return;

        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists(mixed $offset): bool {
        return isset($this->container[$offset]);
    }

    public function offsetUnset(mixed $offset): void {
        if($this->readonly) return;

        unset($this->container[$offset]);
    }

    /*
        Countable
    */
    public function count(): int {
        return count($this->container);
    }

    /*
        JsonSerializable
    */
    public function jsonSerialize(): mixed {
        return $this->container;
    }
}