# Framework

Чек лист:

1 Этап:
1.1 Создать гит репозиторий + 
https://github.com/suomalainenvitali/Framework
1.2 создать минимальную структуру файлов +
1.3 роутинг +
1.4 основной класс приложения +
1.5 создание класса Config +

1 Вопросы по окончанию этапа:
1.1 Почему singltone называют антипаттерн?
Синглтон нарушает SRP. Помимо того чтобы выполнять свои непосредственные обязанности, занимается еще и контролированием количества своих экземпляров.
Глобальное состояние. Когда мы получаем доступ к экземпляру класса, мы не знаем текущее состояние этого класса, и кто и когда его менял, и это состояние может быть вовсе не таким, как ожидается. Корректность работы с синглтоном зависит от порядка обращений к нему, что вызывает неявную зависимость подсистем друг от друга и, как следствие, серьезно усложняет разработку.
Зависимость обычного класса от синглтона не видна в публичном контракте класса. Так как обычно экземпляр синглтона не передается в параметрах метода, а получается напрямую, через GetInstance(), то для выявления зависимости класса от синглтона надо залезть в тело каждого метода — просто просмотреть публичный контракт объекта недостаточно.
Наличие синглтона понижает тестируемость приложения в целом и классов, которые используют синглтон, в частности. 
1.2 Зачем нужен автолоад классов?
Для того, чтобы при работе с классами из других файлов, не было необходимости в каждом файле прописывать зависимости в ручную, а обращаться к необходимым классам используя определенные неймспейсы, объявленные в классе. Автозагрузчик автоматически определит нахождение класса и подключит его файл, достаточно только указать правильный неймспейс (который в большинстве случаев автоматически проставляется в файле использующем класс, средой разработки).
1.3 Зачем нужен роутинг?
Это маршрутизация: входящий URL разбирается специальным образом и по его результату выполняется определенный код. С роутингом напрямую связано понятие ЧПУ (человекопонятные урлы), которое позволяет исключить в адресах сложные параметры. Таким образом роутинг помогает сделать маршрутизацию более понятной, а также создать единую точку в приложении, через которую будут проходить все адреса и подгружаться необходимые данные. Обычно index.php в корневой папке сайта. 