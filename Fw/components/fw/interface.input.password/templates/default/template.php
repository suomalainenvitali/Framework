<?php
/*
    Password component

    $params - содержит набор параметров, которые принимает компонент

    $printProperty - анонимная функция, выводящая в форматированном виде атрибут из набора параметров

    Аттрибуты компонента password:
    additional_class => класс, которым наделяется компонент
    attr => массив атрибутов, которые добавляются в компонент по принципу $key => $value
    disabled => eсли значение true - делает компонент неактивным
    id => id компонента
    maxlength => значение максимальной длинны вводимой строки в поле
    minlength => значение минимальной длинны вводимой строки в поле
    name => имя компонента
    pattern => регулярное выражение для проверки соответствия вводимых значений шаблону
    readonly => если значение true - разрешает только чтение компонента
    required => если значение true - делает компонент обязательным
    size => размер шрифта компонента
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
        case "disabled":
            if ($params["disabled"]) echo " disabled";
            break;
        case "id":
            if ($params["id"]) echo " id='{$params["id"]}'";
            break;
        case "maxlength":
            echo " maxlength='{$params["maxlength"]}'";
            break;
        case "minlength":
            echo " minlength='{$params["minlength"]}'";
            break;
        case "name":
            echo " name='{$params["name"]}'";
            break;
        case "pattern":
            echo " pattern='{$params["pattern"]}'";
            break;
        case "readonly":
            if ($params["readonly"]) echo " readonly";
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
    $printProperty("disabled");
    $printProperty("id");
    $printProperty("maxlength");
    $printProperty("minlength");
    $printProperty("name");
    $printProperty("pattern");
    $printProperty("readonly");
    $printProperty("required");
    $printProperty("size");
    ?>
>