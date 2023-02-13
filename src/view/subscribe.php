<?php
class SubscribeView
{
    public $controller;
    public $template;
    // public $email = "";
    // public $password = "";

    public function __construct(SubscribeController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "subscribe.php";
    }

    public function render()
    {
        require($this->template);
        if(isset($_POST)){
            $this->controller->createUser();
        }
    }
}
