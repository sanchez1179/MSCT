<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once './config/database.php';
////include_once './tasks/task.php';
//
//// instantiate database and task object
//$database = new Database();
//$db = $database->getConnection();
//$database->getTaskList();




$ishTask = array("name" => "Eli", "description" => "Hello", "status" => "In pain");
//$ishTask = (object)$ishTask;
$str = "";
foreach($ishTask as $key => $values){
    $query = "UPDATE tasks $key  = $values WHERE id = 3";
    $str = $str . $query . "\n";
//            $stmt = $this->db->prepare($query);
//            $stmt->execute();
}



$DB = new Database();

//$DB->addTask($ishTask);

$DB->updateTask(3, $ishTask);

$DB->markTaskAsCompleted(3);

$table = $DB->getTaskList();

echo json_encode($str);
//// initialize object
//$task = new Task($db);
////$ishTask;
////
////$ishTask->name = "Ish";
////$ishTask->description = "Putas";
////$ishTask->status = "In pain";
////$task->addTask($ishTask);
//// query tasks
//$stmt = $task->getTaskList();
//
//echo json_encode($stmt);
//
////// check if more than 0 record found
////if($num>0){
////
////    // tasks array
////    $tasks_arr = array();
////    $tasks_arr["records"] = array();
////
////    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
////        extract($row);
////
////        $task = array(
////            "name" => $name,
////            "description" => html_entity_decode($description),
////            "status" => $status,
////            "created" => $created,
////            "completed" => $completed
////        );
////
////        array_push($tasks_arr["records"], $task);
////    }
////
////    echo json_encode($tasks_arr);
////}
//
//else{
//    echo json_encode(
//        array("message" => "No tasks found.")
//    );
//}
?>