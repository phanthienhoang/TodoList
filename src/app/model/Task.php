<?php

class Task extends DB
{
    public function getDataTask(){
        $sql = "SELECT * FROM tasks";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function createTask($atribute)
    {
        $sql = "INSERT INTO `tasks`(`work_name`, `start_date`, `end_date`, `status`) VALUES (:work_name,:start_date,:end_date,:status)";
        $statement = $this->con->prepare($sql);
        if($statement->execute($atribute))
        {
            echo json_encode(array("statusCode"=>200));
        } else{
            echo "Error: " . $sql . "<br>" . $statement->error;
        }
    }

    public function editTask($atribute)
    {
        $sql = "SELECT * FROM tasks WHERE id=:id";
        $statement = $this->con->prepare($sql);
        $statement->execute($atribute);
        $result = $statement->fetchAll();
        return $result;
    }

    public function updateTask($atribute, $id)
    {
        $sql = "UPDATE tasks SET work_name=:work_name, start_date=:start_date, end_date=:end_date, status=:status  WHERE id=:id";
        $statement = $this->con->prepare($sql);
        if($statement->execute($atribute))
        {
            echo json_encode(array("statusCode"=>200));
        } else{
            echo "Error: " . $sql . "<br>" . $statement->error;
        }
    }
}