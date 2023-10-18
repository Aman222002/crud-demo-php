<?php

class pdo1
{
    private $db;
    private $table = 'users';
    public function __construct()
    {
        $this->db = new db2();
    }


    public function getAll( $fields = [], $conditions = [])
    {
        return $this->db->query($this->table, $fields, $conditions);
    }
    public function delete( $conditions = [])
    {
        return $this->db->deletedata($this->table, $conditions);
    }
    public function update( $updateval = [], $conditions = [])
    {
        return $this->db->updatedata($this->table, $updateval, $conditions);
    }
    public function insert( $column = [])
    {
        return $this->db->insert($this->table, $column);
    }
}
