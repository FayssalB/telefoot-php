<?php

class SubscribeController
{
    public $model;
    public $hash;

    public function __construct(SubscribeModel $model)
    {
        $this->model = $model;
        $this->hash =  password_hash($this->model->password, PASSWORD_DEFAULT);
    }


    public function createUser()
    {
        if (!empty($_POST)) {

            $errors = [];

            if (!filter_var($this->model->email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "email invalide";
            }

            if ($this->model->confirmEmail != $this->model->email) {
                $errors["confirmEmail"] = "L'email n'est pas identique";
            } elseif ($this->model->confirmPassword != $this->model->password) {
                $errors["confirmPassword"] = "Le mot de passe n'est pas identique";
            }

            $number = preg_match("/[0-9]/", $this->model->password);
            $uppercase = preg_match("/[A-Z]/", $this->model->password);
            $lowercase = preg_match("/[a-z]/", $this->model->password);


            if (!$uppercase || !$lowercase || !$number || strlen($this->model->password) < 6) {
                $errors["password"] = "Mot de passe qui ne respecte pas la norme: lettre majuscule + lettre minuscule + chiffre";
            }

            if (empty($errors)) {

                $query = $this->model->db->prepare("INSERT INTO telefoot_users(email,password) VALUES (:email, :password)");
                $query->bindParam(":email", $this->model->email);
                $query->bindParam(":password", $this->hash); //controller

                if ($query->execute()) {
                    echo "Exécution";
                    header("Location: http://localhost/telefoot-php/public/");
                } else {
                    $errors["execute"] = "Erreur lors de la création du compte, veuillez réessayer";
                    echo $errors["execute"];
                }
                
            } else {
                echo "Erreur";
            }
        };
    }
}
