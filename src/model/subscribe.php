<?php
class SubscribeModel
{

    public $db;
    

    public function __construct($db)
    {
        $this->db = $db; 
    }
}