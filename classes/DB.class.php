<?php

class DB
{
    private $con;

    public function __construct()
    {
        try {
            $this->con = new mysqli('localhost', 'root', '', 'maimt');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * @description 
     * @return 
     */
    public function query($table, $fields = [], $conditions = [])
    {
        $sql = "SELECT ";
        if (count($fields)) {
            $sql .= implode(',', $fields);
        } else {
            $sql .= " * ";
        }
        $sql .= " FROM $table";

        if (count($conditions)) {
            $sql .= " WHERE ";
            $i = 0;
            foreach ($conditions as $key => $value) {
                $i++;
                $sql .= $key . " = '" . $value . "'";

                if ($i != count($conditions)) {
                    $sql .= ", ";
                }
            }
        }
        $result  = $this->con->query($sql);

        if ($result) {
            if ($result->num_rows) {
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return [];
            }
        } else {
            echo $sql;
            die($this->con->error);
        }
    }
    public function delete($table,$conditions =[])
    {
        $sql ="DELETE From $table";
        if(count($conditions))
        {
            $sql .= " WHERE ";
            $i = 0;
            foreach ($conditions as $key => $value) {
                $i++;
                $sql .= $key . " = '" . $value . "'";

                if ($i != count($conditions)) {
                    $sql .= " AND ";
                }
            }
        }
        $result =$this-> con->query($sql);
        if($result){
            echo "Deleted";
            return $result;
        }
        else{
            die($this->con->error);
        }
    
}
public function update($table,$updateval=[],$conditions=[])
{
    $sql=" UPDATE ";
    $sql .="$table "."SET ";
    if(count($updateval)){
        $i=0;
        foreach($updateval as $key => $values){
            $i++;
            $sql .=$key ."='" ."$values"."'";
            if($i!=count($updateval)){
                $sql .=", ";
            }
        }
    }
    if(count($conditions))
        {
            $sql .= " WHERE ";
            $i = 0;
            foreach ($conditions as $key => $value) {
                $i++;
                $sql .= $key . " = '" . $value . "'";

                if ($i != count($conditions)) {
                    $sql .= "AND";
                }
            }
        }
    $result =$this-> con->query($sql);
    if($result){
        echo "Updated";
        return $result;
    }else{
        die($this->con->error);
    }
}
    
}

