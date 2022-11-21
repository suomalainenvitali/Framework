<?php
/*
    Checkbox component

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров

    Аттрибуты компонента checkbox:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    checked => если значение true - делает компонент активированным
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    name => имя компонента
    required => если значение true - делает компонент обязательным
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
        case "checked":
            if ($params["checked"]) echo " checked";
            break;
        case "disabled":
            if ($params["disabled"]) echo " disabled";
            break;
        case "id":
            if ($params["id"]) echo " id='{$params["id"]}'";
            break;
        case "name":
            echo " name='{$params["name"]}'";
            break;
        case "required":
            if ($params["required"]) echo " required";
            break;
        case "title":
            echo $params["title"];
            break;
        case "type":
            echo " type='{$params["type"]}'";
            break;
        case "value":
            echo " value='{$params["value"]}'";
            break;
    }
}
?>

<span>
    <?php $printProperty("title"); ?>
</span>
<input 
    <?php
    $printProperty("type");
    $printProperty("additional_class");
    $printProperty("attr");
    $printProperty("checked");
    $printProperty("disabled");
    $printProperty("id");
    $printProperty("name");
    $printProperty("required");
    $printProperty("value");
    ?>
>