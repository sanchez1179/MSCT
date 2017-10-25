<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'task.php';

// instantiate database and task object
$database = new Database();
$db = $database->getConnection();

// initialize object
$task = new Task($db);

// query tasks
$stmt = $task->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // tasks array
    $tasks_arr = array();
    $tasks_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $task = array(
            "name" => $name,
            "description" => html_entity_decode($description),
            "status" => $status,
            "created" => $created,
            "completed" => $completed
        );

        array_push($tasks_arr["records"], $task);
    }

    echo json_encode($tasks_arr);
}

else{
    echo json_encode(
        array("message" => "No tasks found.")
    );
}
?>