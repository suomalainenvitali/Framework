<?php
namespace Fw\Core;

class Application{

    private $pager = null;
    private $template = null;
    private $template_path = null;
    
    public function __construct()
    {
        $this->template = "templates/main";
        $this->pager = new Page();

        $template_id = Config::get($this->template);
        
        if(isset($template_id)) {
            $this->template_path = __DIR__ . "/../templates/" . $template_id . "/";
        } else { 
            $this->template_path = __DIR__ . "/../templates/main/";
        }
    }

    public function header() {
        $this->startBuffer();
        
        include $this->template_path . "header.php";   
        $this->pager->showHead();
    }

    public function footer() {
        include $this->template_path . "footer.php";      
        $this->endBuffer();      
    }

    private function startBuffer() {
        ob_start();
    }

    private function endBuffer() {
        $content = ob_get_contents();

        foreach ($this->pager->getAllReplace() as $macros => $value) {
            $content = str_replace($macros, $value, $content);
        }

        ob_end_clean();

        echo $content;
    }

    private function clearBuffer() {
        ob_clean();
    }

    public function getPager() {
        return $this->pager;
    }
}

