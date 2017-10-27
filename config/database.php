<?php
class Database {
    private $db;
    private $host = "localhost";
    private $db_name = "TMA API";
    private $username = "root";
    private $password = "root";

    function __construct()
    {
        try {
            $this->db = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password);
        } catch (PDOException $e)
        {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }
    public function addTask($task) {
        $query = "INSERT INTO tasks VALUES(?, ?, ?, NOW(), NULL, NULL)";
        $id = (int)$this->db->lastInsertId() + 1;
        $stmt = $this->db->prepare($query);
        $stmt->execute(array($task->name, $task->description, $task->status));
        $this->id = $this->id + 1;
    }

    public function taskList() {
        $query = "SELECT * FROM tasks";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTask($id, $name, $description, $status) {
        if ($name != "") {
            $query = "UPDATE tasks SET name = '".$name."' WHERE id = ".$id;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }

        if ($description != "") {
            $query = "UPDATE tasks SET description = '".$description."' WHERE id = ".$id;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }

        if ($status != "") {
            $query = "UPDATE tasks SET status = '".$status."' WHERE id = ".$id;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }
    }

    public function markTaskAsCompleted($id) {
        $query = "UPDATE tasks SET completed = NOW() WHERE id = ".$id;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}
?>