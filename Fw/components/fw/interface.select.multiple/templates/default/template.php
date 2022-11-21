<?php
/*
    Select multiple component 

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров комплексного компонента 
    select multiple

    Аттрибуты компонента select multiple:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    name => имя, которое дается всем компонентам select комплексного компонента select multiple
    title => поле описывающее название компонента при отображении
    type => тип комплексного компонента

    $printPropertySelect - анонимная функция, выводящая в форматированном виде атрибуты select из набора параметров элемента
    принимает на вход название атрибута и элемент, из которого она будет брать значение атрибута

    Аттрибуты компонента select:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    multiple => если значение true - разрешает множественный выбор в компоненте select
    required => если значение true - делает компонент обязательным
    size => размер шрифта компонента
    title => поле описывающее название компонента при отображении
    value => значение компонента select

    $printPropertyOption - анонимная функция, выводящая в форматированном виде атрибуты option из набора параметров элемента
    принимает на вход название атрибута и элемент, из которого она будет брать значение атрибута

    Аттрибуты элемента Option:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    disabled => eсли значение true - делает компонент неактивным
    selected => если значение true - делает элемент выбранным
    title => отображаемое значение элемента выбора
    value => значение элемента выбора 
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


$printPropertySelect = function ($attribute, $select) {

    if (!isset($select[$attribute])) return;

    switch ($attribute) {
        case "additional_class":
            echo " class='{$select["additional_class"]}'";
            break;
        case "attr":
            foreach ($select["attr"] as $key => $value) echo " $key='$value'";
            break;
        case "disabled":
            if ($select["disabled"]) echo " disabled";
            break;
        case "id":
            if ($select["id"]) echo " id='{$select["id"]}'";
            break;
        case "multiple":
            if ($select["multiple"]) echo " multiple";
            break;
        case "required":
            if ($select["required"]) echo " required";
            break;
        case "size":
            echo " size='{$select["size"]}'";
            break;
        case "title":
            echo $select["title"];
            break;
    }
};

$printPropertyOption = function ($attribute, $option) {

    if (!isset($option[$attribute])) return;

    switch ($attribute) {
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
    <?php $printProperty("title"); ?>
</span>
<div 
    <?php
    $printProperty("additional_class");
    $printProperty("attr");
    ?>
>
    <?php
    if (isset($params["list"])) {
        foreach ($params["list"] as $select) {
    ?>
            <span>
                <?php $printPropertySelect("title", $select); ?>
            </span>
            <select 
                <?php
                $printPropertySelect("additional_class", $select);
                $printPropertySelect("attr", $select);
                $printPropertySelect("disabled", $select);
                $printPropertySelect("id", $select);
                $printPropertySelect("multiple", $select);
                $printProperty("name");
                $printPropertySelect("required", $select);
                $printPropertySelect("size", $select);
                ?>
            >
                <?php
                if (isset($select["list"])) {
                    foreach ($select["list"] as $option) {
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
            <br>
    <?php
        }
    }
    ?>
</div>
