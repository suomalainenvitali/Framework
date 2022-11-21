<?php
/*
    Textarea component

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров

    Аттрибуты компонента Textarea:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    cols => колчество символов в строке
    default => значение которое подставляется в аттрибут placeholder компонента
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    maxlength => значение максимальной длинны вводимого текста в поле
    name => имя компонента
    readonly => если значение true - разрешает только чтение компонента
    required => если значение true - делает компонент обязательным
    rows => количество отображаемых строк
    title => поле описывающее название компонента при отображении
    type => тип компонента
    value => значение компонента
    wrap => параметры переноса строк компонента 
*/


$params = $this->component->params;

$printProperty = function ($value) use ($params) {

    if (!isset($params[$value])) return;

    switch ($value) {
        case "additional_class":
            echo " class='{$params["additional_class"]}'";
            break;
        case "attr":
            foreach ($params["attr"] as $key => $value) echo " $key='$value'";
            break;
        case "cols":
            echo " cols='{$params["cols"]}'";
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
        case "maxlength":
            echo " maxlength='{$params["maxlength"]}'";
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
        case "rows":
            echo " rows='{$params["rows"]}'";
            break;
        case "title":
            echo $params["title"];
            break;
        case "type":
            echo " type='{$params["type"]}'";
            break;
        case "wrap":
            echo " wrap='{$params["wrap"]}'";
            break;
    }
}
?>

<span>
    <?php $printProperty("title"); ?>
</span>
<br>
<textarea 
    <?php
    $printProperty("type");
    $printProperty("additional_class");
    $printProperty("attr");
    $printProperty("cols");
    $printProperty("default");
    $printProperty("disabled");
    $printProperty("id");
    $printProperty("maxlength");
    $printProperty("name");
    $printProperty("readonly");
    $printProperty("required");
    $printProperty("rows");
    $printProperty("wrap");
    ?>
></textarea>