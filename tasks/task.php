<?php

class Task{
    private $conn;
    private $table_name = "tasks";

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

    public function read(){

        $query = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}