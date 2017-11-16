<?php

require 'database/database.php';

require 'config.php';

require 'database/Query.php';





 $query = new Query( $conn = Connection::conn($config));

 $parameters = (array)$_POST;


 $method = $_SERVER['REQUEST_METHOD'];


$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$id = 5;


switch ($method) {
     case 'GET':
         if ($uri == 'list') {
             $query->taskList('tasks');
             break;
         } else {
             notFound();
             break;
         }

     case 'POST':
         if ($uri == 'record') {
             $query->addTask('tasks', $parameters);
             break;
         }else if($uri == 'update'){
            $query->updateTask('tasks',$parameters,$id);
            break;
        }
         else {
             notfound();
             break;
         }

    default:
        notFound();
        break;
 }

function notFound(){

     echo "404. Not dFound";

}
