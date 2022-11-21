<?php
/*
    Number component

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров

    Аттрибуты компонента number:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    default => значение которое подставляется в аттрибут placeholder компонента
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    max => конечный порог значений в поле
    min => начальный порог значений в поле
    name => имя компонента
    readonly => если значение true - разрешает только чтение компонента
    required => если значение true - делает компонент обязательным
    step => шаг изменения значений
    title => поле описывающее название компонента при отображении
    type => тип компонента
    value => значение компонента 
*/

$params = $this->component->params;

$printProperty = function ($attribute) use ($params) {

    if (!isset($params[$attribute])) return;

    switch ($attribute) {
        case "additional_class":
            echo " class='{$params["additional_class"]}'";
            break;
        case "attr":
            foreach ($params["attr"] as $key => $value) echo " $key='$value'";
            break;
        case "default":
            echo " placeholder='{$params["default"]}'";
            break;
        case "disabled":
            if ($params["disabled"]) echo " disabled";
            break;
        case "id":
            if ($params["id"]) echo " id='{$params["id"]}'";
            break;
        case "max":
            echo " max='{$params["max"]}'";
            break;
        case "min":
            echo " min='{$params["min"]}'";
            break;
        case "name":
            echo " name='{$params["name"]}'";
            break;
        case "readonly":
            if ($params["readonly"]) echo " readonly";
            break;
        case "required":
            if ($params["required"]) echo " required";
            break;
        case "step":
            echo " step='{$params["step"]}'";
            break;
        case "title":
            echo $params["title"];
            break;
        case "type":
            echo " type='{$params["type"]}'";
            break;
    }
}
?>

<span>
    <?php $printProperty("title"); ?>
</span>
<br>
<input 
    <?php
    $printProperty("type");
    $printProperty("additional_class");
    $printProperty("attr");
    $printProperty("default");
    $printProperty("disabled");
    $printProperty("id");
    $printProperty("max");
    $printProperty("min");
    $printProperty("name");
    $printProperty("readonly");
    $printProperty("required");
    $printProperty("step");
    ?>
>