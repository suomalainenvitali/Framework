<?php
    //Точка входа в приложение 

    use Fw\Core\Application;
    use Fw\Core\Multiton\Multiton;

    require_once "Fw/init.php";

    $app = Multiton::getInstance(Application::class);
    $app->includeComponent("fw:element.list", "default", array(1, 2, 3));

    $app->header();
    

?>

<pre>
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



