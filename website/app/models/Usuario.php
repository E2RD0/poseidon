<?php

class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = new \Common\Database;
    }
    public function getUsers(){
        $this->db->query('SELECT * FROM usuario');
        return $this->db->resultSet();
    }
}
