<?php
class SubscribeModel
{

    public $db;
    public $email;
    public $password;
    public $confirmEmail;
    public $confirmPassword;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        if(!empty($_POST))
        {
            $this->email = $_POST["email"];
            $this->password = $_POST["password"];
            $this->email = trim(strip_tags($_POST["email"]));
            $this->password = trim(strip_tags($_POST["password"]));
            $this->confirmEmail = trim(strip_tags($_POST["confirmEmail"]));
            $this->confirmPassword = trim(strip_tags($_POST["confirmPassword"]));
        }
  
    }
}