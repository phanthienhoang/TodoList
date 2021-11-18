<?php

class Task extends DB
{
    /*
     SQL get data task
    */
    public function getDataTask($atribute){
        if(empty($atribute)){
            $sql = "SELECT `id`, `work_name`, `start_date`, `end_date`, `status` FROM `tasks`WHERE DELETE_FLG=0";
            $statement = $this->con->prepare($sql);
            $statement->execute();
        }else{
            $sql = "SELECT `id`, `work_name`, `start_date`, `end_date`, `status`, `DELETE_FLG` FROM `tasks`WHERE start_date>=:start_date AND end_date<=:end_date AND DELETE_FLG=0";
            $statement = $this->con->prepare($sql);
            $statement->execute($atribute);
        }
        $result = $statement->fetchAll();
        return $result;
    }

    /*
     SQL insert task
    */
    public function createTask($atribute)
    {
        $sql = "INSERT INTO `tasks`(`work_name`, `start_date`, `end_date`, `status`) VALUES (:work_name,:start_date,:end_date,:status)";
        $statement = $this->con->prepare($sql);
        return $statement->execute($atribute);
    }

    /*
     SQL get detail task
    */
    public function editTask($atribute)
    {
        $sql = "SELECT * FROM tasks WHERE id=:id AND DELETE_FLG=0";
        $statement = $this->con->prepare($sql);
        $statement->execute($atribute);
        $result = $statement->fetchAll();
        return $result;
    }

    /*
     SQL update task
    */
    public function updateTask($atribute)
    {
        $sql = "UPDATE tasks SET work_name=:work_name, start_date=:start_date, end_date=:end_date, status=:status  WHERE id=:id AND DELETE_FLG=0";
        $statement = $this->con->prepare($sql);
        return $statement->execute($atribute);
    }

    /*
     SQL delete task
    */
    public function deleteTask($atribute)
    {
        $sql = "UPDATE tasks SET DELETE_FLG = 1 WHERE id=:id";
        $statement = $this->con->prepare($sql);
        return $statement->execute($atribute);
    }

    /*
     SQL update status task
    */
    public function droppableTask($atribute)
    {
        $sql = "UPDATE tasks SET status=:status WHERE id=:id";
        $statement = $this->con->prepare($sql);
        return $statement->execute($atribute);
    }
}