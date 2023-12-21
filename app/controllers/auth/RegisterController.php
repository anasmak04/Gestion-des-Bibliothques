<?php

namespace App\controllers;

use App\database\DbConfig;

require_once __DIR__ . '/../../../vendor/autoload.php';

class RegisterController
{
    private $database;

    public function __construct()
    {
        $dbconfig = new DbConfig();
        $this->database = $dbconfig->getConnection();
    }

    public function CreateAccount($name, $lastname, $email, $password, $phone, $budget)
    {
        $user_sql = ("INSERT INTO `user` (`name`, `lastname`, `email`, `password`, `phone`, `budget`) 
                      VALUES (:name, :lastname, :email, :password, :phone, :budget)");

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $statement =  $this->database->prepare($user_sql);

        $statement->bindParam(':name', $name);
        $statement->bindParam(':lastname', $lastname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':budget', $budget);

        if ($statement->execute()) {
            $LastInsertedId = $this->database->lastInsertId();
            $sql_user_role = ("INSERT INTO `userole` (`id_user`, `id_role`) VALUES (:id_user, 2)");
            $statement1 = $this->database->prepare($sql_user_role);

            if ($statement1) {
                $statement1->bindParam(':id_user', $LastInsertedId);
                $statement1->execute();
                $path = "../../../views/auth/Login.php";

                header("Location:".$path);
                exit();
            } else {
                echo "error in userrole ";
            }
        } else {
            echo "error in user";
        }
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $registerController = new RegisterController();
    $registerController->CreateAccount($name, $lastname, $email, $password, null, null);
}
