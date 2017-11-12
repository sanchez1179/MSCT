<?php

require 'database/database.php';

require 'config.php';

require 'database/Query.php';

 $conn = Connection::conn($config);

 $query = new Query($conn);

 $results = $query->selectAll('todos');

 //require 'index.view.php';



 var_dump($results);