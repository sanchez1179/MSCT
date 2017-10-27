<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once './config/database.php';




$ishTask = array("name" => "Eli", "description" => "Hello", "status" => "In pain");


$DB = new Database();


$DB->updateTask(3 ,"Build API", "Get Internship", "Progress");

$table = $DB->taskList();

echo json_encode($table);

$uri =explode('/',$_SERVER['REQUEST_URI']);

$method = $_SERVER['REQUEST_METHOD'];


switch($method) {
    case 'POST':
        if($uri[1]=='/database') {
            addTask();
        } else {
            notFound();
        }

        break;

    case 'PUT':
        if($uri[2] != null) {
            updateTask();
        } else {
            notFound();
        }

        break;

    case 'GET':
        if($uri[1]=='/database') {
            taskList();
        } else {
            notFound();
        }
        break;

    default:
        notFound();
        break;


}

function notFound(){
    echo "404. Not Found";
    http_response_code(404);
    die();
}
?>