<?php
/*
    Select component

    $params - содержит набор параметров, которые принимает компонент

    $printPropertySelect - анонимная функция, выводящая в форматированном виде атрибут из набора параметров для компонента select

    Аттрибуты компонента select:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    multiple => если значение true - добавляет возможность выбора множества значений в списке
    name => имя компонента
    required => если значение true - делает компонент обязательным
    size => размер шрифта компонента
    title => поле описывающее название компонента при отображении
    type => тип компонента
    value => значение компонента 

    $printPropertyOption - анонимная функция, выводящая в форматированном виде атрибут из набора параметров для 
    элемента Option компонента Select

    Аттрибуты элемента Option:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    disabled => eсли значение true - делает компонент неактивным
    selected => если значение true - делает элемент выбранным
    title => отображаемое значение элемента выбора
    value => значение элемента выбора 
*/

$params = $this->component->params;

$printPropertySelect = function ($attribute) use ($params) {

    if (!isset($params[$attribute])) return;

    switch ($attribute) {
        case "additional_class":
            echo " class='{$params["additional_class"]}'";
            break;
        case "attr":
            foreach ($params["attr"] as $key => $value) echo " $key='$value'";
            break;
        case "disabled":
            if ($params["disabled"]) echo " disabled";
            break;
        case "id":
            if ($params["id"]) echo " id='{$params["id"]}'";
            break;
        case "multiple":
            if ($params["multiple"]) echo " multiple";
            break;
        case "name":
            echo " name='{$params["name"]}'";
            break;
        case "required":
            if ($params["required"]) echo " required";
            break;
        case "size":
            echo " size='{$params["size"]}'";
            break;
        case "title":
            echo $params["title"];
            break;
    }
};

$printPropertyOption = function ($property, $option) {

    if (!isset($option[$property])) return;

    switch ($property) {
        case "additional_class":
            echo " class='{$option["additional_class"]}'";
            break;
        case "attr":
            foreach ($option["attr"] as $key => $value) echo " $key='$value'";
            break;
        case "disabled":
            if ($option["disabled"]) echo " disabled";
            break;
        case "selected":
            if ($option["selected"]) echo " selected";
            break;
        case "title":
            echo $option["title"];
            break;
        case "value":
            echo " value='{$option["value"]}'";
            break;
    }
}
?>

<span>
    <?php $printPropertySelect("title"); ?>
</span>
<select 
    <?php
    $printPropertySelect("additional_class");
    $printPropertySelect("attr");
    $printPropertySelect("disabled");
    $printPropertySelect("id");
    $printPropertySelect("multiple");
    $printPropertySelect("name");
    $printPropertySelect("required");
    $printPropertySelect("size");
    ?>
>
    <?php
    if (isset($params["list"])) {
        foreach ($params["list"] as $option) {
    ?>
            <option 
                <?php
                    $printPropertyOption("additional_class", $option);
                    $printPropertyOption("attr", $option);
                    $printPropertyOption("disabled", $option);
                    $printPropertyOption("selected", $option);
                    $printPropertyOption("value", $option);
                ?>
            ><?php $printPropertyOption("title", $option); ?></option>
    <?php 
        }
    } 
    ?>
</select>