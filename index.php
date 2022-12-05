<?php

use Fw\Core\Application;
use Fw\Core\Multiton\Multiton;

require_once "Fw/init.php";

$app = Multiton::getInstance(Application::class);

$app->header();

?>

<pre>
-------- 15.12.2022 --------
1) создан конфиг и класс для работы с ними
2) создана функции авто регистрации классов
-------- 10.12.2022 --------
1 Этап:
1.1 Создать гит репозиторий + 
https://github.com/suomalainenvitali/Framework
1.2 создать минимальную структуру файлов +
1.3 роутинг +
1.4 основной класс приложения +
1.5 создание класса Config +
</pre>

<?php $app->footer();?>