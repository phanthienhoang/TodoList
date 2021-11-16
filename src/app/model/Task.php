<?php

class Task extends DB
{
    public function get_task_by_stt(){
        $sql = "SELECT * FROM tasks where status =";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}