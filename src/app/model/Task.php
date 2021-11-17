<?php

class Task extends DB
{
    public function get(){
        $sql = "SELECT * FROM tasks";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


    public function createTask($atribute)
    {
        $sql = "INSERT INTO `tasks`(`word_name`, `start_date`, `end_date`, `status`) VALUES (:word_name,:start_date,:end_date,:status)";
        $statement = $this->con->prepare($sql);
        if($statement->execute($atribute))
        {
            echo json_encode(array("statusCode"=>200));
        } else{
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }

    }
}