<?php

namespace Core;

use PDO;
// db connection 

// class Person
// {
//     public $name;
//     public $age;
//     function breathing()
//     {
//         echo $this->name . " is breathing";
//     }
// }
// $person = new Person();
// $person->name = "shoaib";
// $person->age = "22";

// $person->breathing();

// class to fecth execute db statemants 

class Database
{
    public $connection;
    public $statement;
    function __construct($config, $username = 'root', $password = '')
    {

        $dsn = "mysql:" . http_build_query($config, '', ';');
        // $dsn = "mysql:host={$config['localhost']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    function query($query, $params = [])
    {
        // dd($params);
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }
    function get()
    {
        return $this->statement->fetchAll();
    }
    function find()
    {
        return $this->statement->fetch();
    }
    function findOrFail()
    {
        $results = $this->find();
        if (!$results) {
            abort();
        }
        return $results;
    }
}
