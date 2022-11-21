<?php
/*
    Text multiple component 

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров

    Аттрибуты компонента text multiple:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    name => имя, которое дается всем компонентам text комплексного компонента text multiple
    title => поле описывающее название компонента при отображении
    type => тип комплексного компонента

    $printPropertyElement - анонимная функция, выводящая в форматированном виде атрибуты элементов из набора параметров элемента
    принимает на вход название атрибута и элемент, из которого она будет брать значение атрибута

    Аттрибуты компонента text:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    default => значение которое подставляется в аттрибут placeholder компонента
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    maxlength => значение максимальной длинны вводимой строки в поле
    minlength => значение минимальной длинны вводимой строки в поле
    pattern => регулярное выражение для проверки соответствия вводимых значений шаблону
    readonly => если значение true - разрешает только чтение компонента
    required => если значение true - делает компонент обязательным
    size => размер шрифта компонента
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
        case "default":
            echo " placeholder='{$element["default"]}'";
            break;
        case "disabled":
            if ($element["disabled"]) echo " disabled";
            break;
        case "id":
            if ($element["id"]) echo " id='{$element["id"]}'";
            break;
        case "maxlength":
            echo " maxlength='{$element["maxlength"]}'";
            break;
        case "minlength":
            echo " minlength='{$element["minlength"]}'";
            break;
        case "pattern":
            echo " pattern='{$element["pattern"]}'";
            break;
        case "readonly":
            if ($element["readonly"]) echo " readonly";
            break;
        case "required":
            if ($element["required"]) echo " required";
            break;
        case "size":
            echo " size='{$element["size"]}'";
            break;
        case "title":
            echo $element["title"];
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
            <br>
            <input type='text' 
                <?php
                $printPropertyElement("additional_class", $element);
                $printPropertyElement("attr", $element);
                $printPropertyElement("default", $element);
                $printPropertyElement("disabled", $element);
                $printPropertyElement("id", $element);
                $printProperty("name");
                $printPropertyElement("maxlength", $element);
                $printPropertyElement("minlength", $element);
                $printPropertyElement("pattern", $element);
                $printPropertyElement("readonly", $element);
                $printPropertyElement("required", $element);
                $printPropertyElement("size", $element);
                ?>
            >
            <br>
    <?php    
        }
    }    
    ?>
</div>