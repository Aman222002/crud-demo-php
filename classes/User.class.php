<?php

class User
{
    private $db;
    private $table = 'users';
    private $fields = ['name', 'email', 'phone'];
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAll($fields = [], $conditions = [])
    {
        return $this->db->query($this->table, $fields, $conditions);
    }
    public function delete($conditions = [])
    {
        return $this->db->deletedata($this->table, $conditions);
    }
    public function update($updateval = [], $conditions = [])
    {
        $validated = [];
        $checkUser = $this->checkUser($updateval['email']);
        if ($checkUser) {
            return ['status' => false, "message" => "email already used"];
        }else{
        return $this->db->updatedata($this->table, $updateval, $conditions);
    } }
    public function insert($column = [])
    {
        $errors = [];
        $validated = [];

        $fileds = array_keys($column);
        foreach ($fileds as $field) {
            if (!in_array($field, $this->fields)) {
                unset($data[$field]);
            }
        }
        if ($this->validateField('name', $column)) {
            $validated['name'] = $column['name'];
        } else {
            $errors[] = 'name is required.';
        }
        if (count($errors)) {
            return ['status' => false, "message" => $errors];
        } else {
            // check user
            $checkUser = $this->checkUser($column['name']);

            if ($checkUser) {
                return ['status' => false, "message" => "Name already used"];
            } else {
                // insert
                return $this->db->insert($this->table, $validated);
            }
        }
        // {
        //     return $this->db->insert($this->table, $column);
        // }
    }
    public function validateField($name, $column)
    {
        return (!isset($column[$name]) || (isset($column[$name]) && trim($column[$name]) == ""));
    }
    public function checkUser($email)
    {
        $result = $this->db->query($this->table, [], ['email' => $email]);
        return count($result);
    }
    
}
