<?php
class db2
{
    private $con;

    public function __construct()
    {

        try {
            $this->con = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

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
                    $sql .= ",";
                }
            }
        }
        $stmt  = $this->con->prepare($sql);
        $result = $stmt->execute();

        if ($result) {
            $result = $stmt->fetchAll();
            if (count($result))
                return ["status" => true, "Data" => $result];
            else
                return ["status" => false, "message" => "Record not Found !"];
        } else {
            echo $sql;
            die("Something went wrong");
        }
    }
    public function deletedata($table, $conditions = [])
    {
        $sql = "DELETE From $table";
        if (count($conditions)) {
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
        $stmt  = $this->con->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            echo "Deleted";
            return $result;
        } else {
            echo "$sql";
        }
    }
    public function updatedata($table, $updateval = [], $conditions = [])
    {
        $sql = " UPDATE ";
        $sql .= "$table " . "SET ";
        if (count($updateval)) {
            $i = 0;
            foreach ($updateval as $key => $values) {
                $i++;
                $sql .= $key . "='" . "$values" . "'";
                if ($i != count($updateval)) {
                    $sql .= ", ";
                }
            }
        }
        if (count($conditions)) {
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
        $stmt  = $this->con->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            echo "Updated";
            return $result;
        } else {
            echo "$sql";
        }
    }

    public function insert($table, $column = [])
    {
        $sql = "INSERT INTO " . $table . " (";
        $sql .= implode(",", array_keys($column)) . ') VALUES (';
        $sql .= "'" . implode("','", array_values($column)) . "')";
        echo "$sql";
        $stmt  = $this->con->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            echo "Inserted Succesful  ";
            return $result;
        } else {
            echo "$sql";
        }
    }
}
