<?php
class SubscribeView
{
    public $controller;
    public $template;
    

    public function __construct(SubscribeController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "subscribe.php";
    }

    public function render()
    {
        require($this->template);
        
    }
}