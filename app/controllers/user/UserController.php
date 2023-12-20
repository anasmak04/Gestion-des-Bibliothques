<?php

namespace App\controllers;
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\dao\DaoInterface;
use App\database\DbConfig;
use App\models\User;
use App\models\UserRole;

class UserController implements DaoInterface
{

    private $database;

    /**
     * @param $database
     */
    public function __construct()
    {
        $dbconfig = new DbConfig();
        $this->database = $dbconfig->getConnection();
    }


    public function save($entity){}


    public function savee($User,$UserRole)
    {
    try{

        $user_sql = ("INSERT INTO `user` (`name`, `lastname`, `email`, `password`, `phone`, `budget`) 
                      VALUES (:name, :lastname, :email, :password, :phone, :budget)");

        $name = $User->getName();
        $lastname = $User->getLastname();
        $email = $User->getEmail();
        $password = $User->getPassword();
        $phone = $User->getPhone();
        $budget = $User->getBudget();

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
            $roleid = $UserRole->getRoleId();
            $sql_user_role = ("INSERT INTO `userole` (`id_user`, `id_role`) VALUES (:id_user, :roleid)");
            $statement1 = $this->database->prepare($sql_user_role);

            if ($statement1) {
                $statement1->bindParam(':id_user', $LastInsertedId);
                $statement1->bindParam(':roleid', $roleid);
                $statement1->execute();
                $path = "../../../views/admin/users/user.php";
                header("Location:".$path);
                exit();
            }
    }

    } catch (\Exception $e){
        echo $e->getMessage();
    }

    }


    public function updatee($User ,$UserRole){

        try{

            $user_sql = "UPDATE `user` SET `name`=:name,`lastname`=:lastname,`email`=:email,`password`=:password,`phone`=:phone,`budget`=:budget WHERE id = :id";

            $id = $User->getId();
            $name = $User->getName();
            $lastname = $User->getLastname();
            $email = $User->getEmail();
            $password = $User->getPassword();
            $phone = $User->getPhone();
            $budget = $User->getBudget();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $statement =  $this->database->prepare($user_sql);

            $statement->bindParam(':id', $id);
            $statement->bindParam(':name', $name);
            $statement->bindParam(':lastname', $lastname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $hashedPassword);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':budget', $budget);


            if ($statement->execute()) {
                $id_user = $UserRole->getId_user();
                $roleid = $UserRole->getRoleId();
                $sql_user_role = ("UPDATE `userole` SET `id_role`=:roleid WHERE id = :id_user;");
                $statement1 = $this->database->prepare($sql_user_role);
                if ($statement1) {
                    $statement1->bindParam(':id_user', $id_user);
                    $statement1->bindParam(':roleid', $roleid);
                    $statement1->execute();
                    $path = "../../../views/admin/users/user.php";
                    header("Location:".$path);
                    exit();
                }
            }

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($UserRole) {}

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM user WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result1 = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result1;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findById2($id)
    {
        try {
            $sql = "SELECT * FROM userole WHERE id_user = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result2 = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result2;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    public function findAll()
    {
        try {
            $sql = "SELECT user.id , user.name, user.lastname, user.email, userole.id_role as roleID FROM user INNER JOIN userole on user.id = userole.id_user";
            $statement = $this->database->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function deleteById($id)
    {
        try{
            $sql = "DELETE FROM user WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $sql1 = "DELETE FROM userole WHERE id_user = :id";
            $statement1 = $this->database->prepare($sql1);
            $statement1->bindParam(':id', $id);
            $statement1->execute();
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}





if (isset($_POST['edit-user'])) {
    $user = new User(null, null, null, null, null, null,null);
    $user->setName($_POST['name']);
    $user->setLastname($_POST['lastname']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setPhone($_POST['phone']);
    $user->setBudget($_POST['budget']);
    $userRole = new UserRole(null, null);
    $userRole->setId_user($_POST["id_user"]);
    $userRole->setRoleId($_POST['id_role']);
    $userimp = new UserController();
    $userimp->savee($user, $userRole);
}


if (isset($_POST['edit-submit'])) {

    $user = new User(null, null, null, null, null, null);

    $user->setId($_POST['id']);
    $user->setName($_POST['name']);
    $user->setLastname($_POST['lastname']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setPhone($_POST['phone']);
    $user->setBudget($_POST['budget']);


    $userRole = new UserRole(null, null);
    $userRole->setId_user($_POST['id_user']);
    $userRole->setRoleId($_POST['role_id']);

    $userimp = new UserController();
    $userimp->updatee($user);
}


