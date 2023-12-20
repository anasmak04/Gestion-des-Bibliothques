<?php

namespace App\controllers;
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\dao\DaoInterface;
use App\database\DbConfig;
use App\models\Book;
use Exception;


class BookController implements DaoInterface
{


        private $database;

    /**
     * @param $database
     */
    public function __construct()
    {
        $db = new DbConfig();
        $this->database = $db->getConnection();
    }


    public function save($Book)
    {

     try{
         $sql = ("INSERT INTO `book`(`title`, `author`, `genre`, `description`, `publication_year`, `total_copies`, `available_copies`) VALUES (:title,:author,:genre,:description,:publication_year,:total_copies,:available_copies)");

         $statement = $this->database->prepare($sql);

         $title = $Book->getTitle();
         $author = $Book->getAuthor();
         $genre = $Book->getGenre();
         $description = $Book->getDescription();
         $publication_year = $Book->getPublicationYear();
         $total_copies = $Book->getTotalCopies();
         $available_copies = $Book->getAvailableCopies();

         $statement->bindParam(':title', $title);
         $statement->bindParam(':author', $author);
         $statement->bindParam(':genre', $genre);
         $statement->bindParam(':description', $description);
         $statement->bindParam(':publication_year', $publication_year);
         $statement->bindParam(':total_copies', $total_copies);
         $statement->bindParam(':available_copies', $available_copies);
         $statement->execute();
     }catch(\PDOException $e){
         echo $e->getMessage();
     }

    }

    public function update($Book)
    {
        try {
            $sql = "UPDATE `book` SET `title`=:title, `author`=:author, `genre`=:genre, `description`=:description, `publication_year`=:publication_year, `total_copies`=:total_copies, `available_copies`=:available_copies WHERE id = :id";
            $statement = $this->database->prepare($sql);

            $id = $Book->getId();
            $title = $Book->getTitle();
            $author = $Book->getAuthor();
            $genre = $Book->getGenre();
            $description = $Book->getDescription();
            $publication_year = $Book->getPublicationYear();
            $total_copies = $Book->getTotalCopies();
            $available_copies = $Book->getAvailableCopies();

            $statement->bindParam(':id', $id);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':author', $author);
            $statement->bindParam(':genre', $genre);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':publication_year', $publication_year);
            $statement->bindParam(':total_copies', $total_copies);
            $statement->bindParam(':available_copies', $available_copies);
            $statement->execute();
            return true;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM `book` WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function findAll()
    {
        try {
            $sql = "SELECT * FROM `book`";
            $statement = $this->database->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function deleteById($id)
    {
        try{
            $sql = "DELETE  FROM `book` WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

}

if(isset($_POST['submit'])) {
    $book = new Book(null,null,null,null,null,null,null);
    $book->setTitle($_POST['title']);
    $book->setAuthor($_POST['author']);
    $book->setGenre($_POST['genre']);
    $book->setDescription($_POST['description']);
    $book->setPublicationYear($_POST['publication_year']);
    $book->setTotalCopies($_POST['total_copies']);
    $book->setAvailableCopies($_POST['available_copies']);
    $bookimp = new BookController();
    $bookimp->save($book);
}


if(isset($_POST['submit-edit'])) {
    $book = new Book(null,null,null,null,null,null,null,null);
    $book->setId($_POST["id"]);
    $book->setTitle($_POST['title']);
    $book->setAuthor($_POST['author']);
    $book->setGenre($_POST['genre']);
    $book->setDescription($_POST['description']);
    $book->setPublicationYear($_POST['publication_year']);
    $book->setTotalCopies($_POST['total_copies']);
    $book->setAvailableCopies($_POST['available_copies']);
    $bookimp = new BookController();

    try {
        $bookimp->update($book);
        $path = "../../../views/book/show.php";
        header("Location: " . $path);
        exit;
    }

    catch (\PDOException $e) {
        echo "Error updating book: " . $e->getMessage();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

    