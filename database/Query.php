<?php

class Query
{
    protected $pdo;

    protected $method;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function taskList($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM ($table) ");

        $statement->execute();

        print_r($statement->fetchall(PDO::FETCH_ASSOC));
    }

    public function addTask($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',

            $table,

            implode(', ', array_keys($parameters)),

            ":" . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);

             echo "Your record: ". $parameters['name']  . " has been entered";

        } catch (Exception $e){

            die($e->getMessage());

        }

    }

    public function updateTask($table, $fields, $id)
    {
        $x = 1;
        $set ="";

        foreach($fields as $name => $value) {
            $set .= "{$name} = \"{$value}\"";
            if($x < count($fields)) {
                $set .= ',';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();

            echo "Your record: " . $fields['name'] . " has been entered";

        } catch(Exception $e){

            die($e->getMessage());
        }

    }

}