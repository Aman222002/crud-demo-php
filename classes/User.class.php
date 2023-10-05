<?php

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

     public function getAll()
     {
         return $this->db->query('users', ['name', 'email'], ['name' => 'Aman']);
     }
    public function delete()
    {
        return $this->db->delete('users',['name' =>'Aman']);
    } 
    public function update()
    {
        return $this->db->update('users',['name'=>'Aman'],['id'=>'1']);
    }
}
