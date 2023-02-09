<?php
class SubscribeController
{
    public $model;

    public function __construct(SubscribeModel $model)
    {
        $this->model = $model;
    }

    public function createUser()
    {
        $query = $this->model->db->prepare("INSERT INTO telefoot_users(email,password) VALUES (:email, :password)");
    }
}