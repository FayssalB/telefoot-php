<?php 
class LoginController{

    public $model;
    public $password;

    public function __construct(LoginModel $model){
        $this->model = $model;

    }

    public function getUser(){
        $query =  $this->model->db->prepare("SELECT * FROM telefoot_users WHERE email LIKE :email");
        $query->bindParam(":email", $this->model->email);
        $query->execute();
        $result = $query->fetch();
        var_dump($result);

        if(!empty($result) && password_verify($this->model->password, $result["password"])){
            var_dump($result);
            echo "OK";
        }else 
        {
            echo "Aucun compte trouver";
        }
    }
}
?>