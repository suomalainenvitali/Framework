<?php
    //Точка входа в приложение 

    use Fw\Core\Application;
    use Fw\Core\Multiton\Multiton;

    require_once "Fw/init.php";

    $params = [
        'additional_class' => 'window--full-form', 
        'attr' => [ 
            'data-form-id' => 'form-123'
        ],
        'method' => 'post',
        'action' => '', 
        'elements' => [ 
            [
                'type' => 'text',
                'name' => 'login',
                'additional_class' => 'js-login',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин',
                'default' => 'Введите имя'
            ],
            [
                'type' => 'password',
                'name' => 'password',
                'title' => 'Пароль'
            ],
            [
                'type' => 'select',
                'name' => 'server',
                'additional_class' => 'js-login',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Выберите сервер',
                'list' => [
                    [
                        'title' => 'Онлайнер',
                        'value' => 'onliner',
                        'additional_class' => 'mini--option',
                        'attr' => [
                            'data-id' => '188'
                        ],
                        'selected' => true
                    ],
                    [
                        'title' => 'Тутбай',
                        'value' => 'tut',
                    ]
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'login',
                'additional_class' => 'js-login',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин'
            ]
        ]
    ];

    $app = Multiton::getInstance(Application::class);
    $app->getPager()->addCss("https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css");
    $app->header();
    $app->includeComponent("fw:interface.form", "default", $params);
    
    

?>

<pre>
-------- 21.11.2022 --------
4 Этап:
4.1 Стилизовать наш сайт+
4.2 Создать компонент рендера формы

Элементы формы:
input checkbox +
input checkbox multiple +
input email +
input number +
input password +
input radio +
input text +
input text multiple +
textarea +
select +
select multiple +

-------- 18.11.2022 --------
3 Этап:
3.1 Создание класса \Core\Type\Dictionary +
3.2 Создание класса Request который наследуется от Dictionary +
3.3 Создание класс Server который наследуется от Dictionary +
3.4 Создание класс Session который наследуется от Dictionary +
3.5 Доработка Application +
3.6 Компоненты +
3.7 Доработка Application +
3.8 Доработка Page и буффер +
-------- 15.11.2022 --------
2 Этап:
2.1 Создание класса реализующий multiton +
2.2 init.php +
2.2.1 Добавление константы подключения ядра (в init.php) и дальнейшее использование константы
в подключаемых файлах +
2.2.2 инициализация объекта Application +
2.3 Создание структуры шаблона сайта +
2.4 Доработка Application, внедрение буффера +
2.5 Создание класса Page +
2.6 Добавить инициализацию Page в конструктор Application в поле $pager +
2.7 Создание страницы истории изменения проекта +
-------- 10.11.2022 --------
1 Этап:
1.1 Создать гит репозиторий + 
https://github.com/suomalainenvitali/Framework
1.2 создать минимальную структуру файлов +
1.3 роутинг +
1.4 основной класс приложения +
1.5 создание класса Config +
</pre>

<?php $app->footer();?>



