<?php
namespace Fw\Core;

use Fw\Core\Component\Base;
use Fw\Core\Component\Template;
use Fw\Core\Multiton\Multiton;
use Fw\Core\Type\Request;
use Fw\Core\Type\Server;
use Fw\Core\Type\Session;

//Класс приложения
class Application{

    private $pager = null;
    private $template = null;
    private $template_path = null;
    private $session = null;
    private $request = null;
    private $server = null;
    
    //Конструктор класса
    public function __construct()
    {
        $this->template = "templates/main";
        $this->pager = new Page();
        $this->session = Multiton::getInstance(Session::class);
        $this->request = Multiton::getInstance(Request::class);
        $this->server = Multiton::getInstance(Server::class);

        $template_id = Config::get($this->template);
        
        if(isset($template_id)) {
            $this->template_path = __DIR__ . "/../templates/" . $template_id . "/";
        } else { 
            $this->template_path = __DIR__ . "/../templates/main/";
        }
    }

    //Вывод шаблона header
    public function header(): void {
        $this->startBuffer();

        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "#FW_HEADERS#"; 
        echo "</head>"; 
        echo "<body>";
        
        
        include $this->template_path . "header.php";        
    }
    //Вывод шаблона footer нашего сайта
    public function footer(): void {
        include $this->template_path . "footer.php";       
        $this->endBuffer();    

        echo "</body>";
        echo "</html>";
    }
    //Старт работы буфера вывода
    private function startBuffer(): void {
        ob_start();
    }
    //Получение контента из буфера ввода, замена макросов и остановка буффера вывода
    private function endBuffer(): void {
        $content = ob_get_contents();
        $content = str_replace("#FW_HEADERS#", $this->pager->showHead(), $content);
        foreach ($this->pager->getAllReplace() as $macros => $value) {
            $content = str_replace($macros, $value, $content);
        }

        ob_end_clean();

        echo $content;
    }
    //Очистка буфера вывода
    private function clearBuffer(): void {
        ob_clean();
    }
    //Возвращает pager
    public function getPager(): Page {
        return $this->pager;
    }
    //Возвращает сессии
    public function getSession(): Session {
        return $this->session;
    }
    //Возвращает запросы
    public function getRequest(): Request {
        return $this->request;
    }
    //Возвращает серверную информацию
    public function getServer(): Server {
        return $this->server;
    }
    //Покдлючение компонента
    public function includeComponent(string $component, string $template, array $params) {
        //Создание экземпляра компонента
        $component = $this->getIncludeComponent($component, $params);
        
        if (is_null($component)) return;
        //Создание экземпляра шаблона
        $component_template = $this->getIncludeTemplate($template, $component);

        //Подключение к компоненту шаблона
        $component->template = $component_template;
        //Выполнение работы компонента и получение результата
        $component->executeComponent();
        //Рендеринг шаблона
        $component_template->render();      
    }

    //Получение экземпляра компонента
    private function getIncludeComponent(string $component, array $params): Base {
        //Получение пространства имен и айди компонента
        list($component_namespace, $component_id) = explode(":", $component); 
        //Составление пути до компонента
        $component_path = __DIR__ . "/../components/$component_namespace/$component_id/";
        $component_class_name = "";
        //Получение названия класса компонента
        foreach (explode(".", $component_id) as $value) {
            $component_class_name = $component_class_name . ucfirst($value);
        }
        //Путь файла класса компонента
        $component_include = $component_path . $component_class_name . ".class.php";

        if (!file_exists($component_include)) return null;
        //Подключение компонента
        include_once $component_include;
        //Инициализация и заполнение свойств компонента
        $component = new $component_class_name();
        $component->id = $component_id;        
        $component->params = $params;
        $component->__path = $component_path;

        return $component;
    }
    //Получение экземпляра шаблона компонента
    private function getIncludeTemplate(string $template, Base $component) {
        //Путь до шаблона компонента
        $template_path = $component->__path . "templates/$template/";
        //Относительный путь до шаблона компонента
        $relative_path = "Framework/Fw/components" . explode("components", $template_path)[1];
        //Инициализация и заполнение свойств шаблона компонента
        $component_template = new Template($template, $component);
        $component_template->setPath($template_path);
        $component_template->setRelativePath($relative_path); 

        return $component_template;
    }
}

