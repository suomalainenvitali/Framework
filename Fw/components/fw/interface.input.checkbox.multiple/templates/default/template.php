<?php
/*
    Checkbox multiple component 

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров

    Аттрибуты компонента checkbox multiple:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    name => имя, которое дается всем компонентам checkbox комплексного компонента checkbox multiple
    title => поле описывающее название компонента при отображении
    type => тип комплексного компонента

    $printPropertyElement - анонимная функция, выводящая в форматированном виде атрибуты элементов из набора параметров элемента
    принимает на вход название атрибута и элемент, из которого она будет брать значение атрибута

    Аттрибуты компонента checkbox:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    checked => если значение true - делает компонент активированным
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    required => если значение true - делает компонент обязательным
    title => поле описывающее название компонента при отображении
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
        case "name":
            echo " name='{$params["name"]}'";
            break;
        case "title":
            echo $params["title"];
            break;
        case "type":
            echo " type='{$params["type"]}'";
            break;
    }
};

$printPropertyElement = function ($attribute, $element) {

    if (!isset($element[$attribute])) return;

    switch ($attribute) {
        case "additional_class":
            echo " class='{$element["additional_class"]}'";
            break;
        case "attr":
            foreach ($element["attr"] as $key => $value) echo " $key='$value'";
            break;
        case "checked":
            if ($element["checked"]) echo " checked";
            break;
        case "disabled":
            if ($element["disabled"]) echo " disabled";
            break;
        case "id":
            if ($element["id"]) echo " id='{$element["id"]}'";
            break;
        case "required":
            if ($element["required"]) echo " required";
            break;
        case "title":
            echo $element["title"];
            break;
        case "value":
            echo " value='{$element["value"]}'";
            break;
    }
}
?>

<span>
    <?php $printProperty("title") ?>
</span>
<div 
    <?php
        $printProperty("additional_class");
        $printProperty("attr");
    ?>
>
    <?php
    if (isset($params["list"])) {
        foreach ($params["list"] as $element) { 
    ?>
            <span>
                <?php $printPropertyElement("title", $element); ?>
            </span>
            <input type='checkbox' 
                <?php
                $printPropertyElement("additional_class", $element);
                $printPropertyElement("attr", $element);
                $printPropertyElement("checked", $element);
                $printPropertyElement("disabled", $element);
                $printPropertyElement("id", $element);
                $printProperty("name");
                $printPropertyElement("required", $element);
                $printPropertyElement("value", $element);
                ?>
            >
    <?php    
        }
    }    
    ?>
</div>