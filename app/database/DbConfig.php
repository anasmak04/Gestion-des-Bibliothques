<?php

namespace App\database;

use PDO;
use PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');

$dotenv->load();

class DbConfig
{

    private $username;
    private $password;
    private $dbname;
    private $servername;
    private $db;


    public function __construct(){

        $this->username = $_ENV["DB_username"];
        $this->password = $_ENV["DB_password"];
        $this->dbname = $_ENV["DB_dbname"];
        $this->servername = $_ENV["DB_servername"];
    }


    public  function getConnection()
    {
       try{
           $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
           return $this->db;
       }catch(PDOException $e){
           echo $e->getMessage();
       }
    }


}


