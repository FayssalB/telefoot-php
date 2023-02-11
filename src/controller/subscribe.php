<?php



class SubscribeController
{
    public $model;

    public function __construct(SubscribeModel $model)
    {
        $this->model = $model;
    }

    public function createUser(string $email, string $password)
    {
        if(empty($errors)){
            $query = $this->model->db->prepare("INSERT INTO telefoot_users(email,password) VALUES (:email, :password)");
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);

            if($query->execute()){
               echo "ouiouioui";
            }else{
                $errors["execute"] = "Comme dhaaaaaaaaaaaab ";
                echo $errors["execute"];
            }
        }
        
    }
}

?>