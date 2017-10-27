<?php

class Task{
    private $conn;
    private $table_name = "tasks";
    private $id = 1;

    //task properties
    public $name;
    public $description;
    public $status;
    public $created;
    public $completed;

    //constructor with $db as datatbase connection
    public function __construct($db){

        $this->conn = $db;

    }

    public function getTaskList(){


        //$query = "SELECT * FROM  ".$this->table_name;

        $query = 'INSERT INTO tasks VALUES("ish", "description", "status", NOW(), NULL, 1 )';
        $stmt  = $this->conn->prepare($query);
        $this->conn->exec($query);

    }

    public function addTask(){
//        $query = "INSERT INTO ". $this->table_name . "VALUES(" . $task->name . "," . $task->description .
//            "," . $task->status . ", NOW() , NULL ,". $this->id . ");";
//
//        $stmt = $this->conn->prepare($query);
//        $stmt->execute();
//        $query = "INSERT INTO ? VALUES(?, ?, ?, ?, ?, ? )";
        $query = "INSERT INTO tasks VALUES('ish', 'description', 'status', NOW(), NULL, 1 );";
        //$stmt  = $this->conn->prepare($query);
        $this->conn->exec($query);
//        $stmt->execute(array($this->table_name, $task->name, $task->description, $task->status, "NOW()", "NULL", $this->id));
        //$this->id = $this->id + 1;

        //return $stmt;


    }
}