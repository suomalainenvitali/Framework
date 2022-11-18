<?php
//Массив конфигов
function getConfigs(): array {
    return [
        "db" => [
            "login" => "login_value",
            "register" => "register_value"
        ],
        "templates" => [
            "main" => "main",
            "new_template" => 2,
            "old_template" => 3
        ]
    ];
}
?>