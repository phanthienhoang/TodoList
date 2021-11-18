<?php

class DB{

    public $con;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "to_do_list";
    private $charset = "utf8";

    public function __construct()
    {
        $this->con = $this->connection();
    }

    /*
     Function connect db with PDO
    */
    public function connection()
    { 
        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname .";charset=".$this->charset;
            $pdo =  new PDO($dsn,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);         
            return $pdo;
        } catch (\PDOException $e) {
            echo "connect failed " . $e->getMessage();
        }
    }
}

