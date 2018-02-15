<?php

require_once("config.php");

class Database
{

    private $con = null;

    public function __construct()
    {
        $this->conect();
    }

    public function getConection()
    {
        return $this->con;
    }

    public function conect()
    {
        $this->con = $con = mysqli_connect(DB_end, DB_user, DB_password, DB_name);
    }



}