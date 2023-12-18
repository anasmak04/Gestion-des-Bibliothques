<?php

namespace Book;

use dao\DaoInterface;
use DbConfig;
use models\Book;
use models\User;

require_once "../../dao/DaoInterface.php";
require_once "../../models/Book.php";
require_once "../../database/DbConfig.php";
class BookController implements DaoInterface
{


        private $databasse;

    /**
     * @param $databasse
     */
    public function __construct()
    {
        $db = new DbConfig();
        $this->databasse = $db->getConnection();
    }


    public function save($Book)
    {

     $sql = ("INSERT INTO `book`(`title`, `author`, `genre`, `description`, `publication_year`, `total_copies`, `available_copies`) VALUES (:title,:author,:genre,:description,:publication_year,:total_copies,:available_copies)");

     $statement = $this->databasse->prepare($sql);

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

    }

    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

}

if(isset($_POST['submit'])) {
    $user = new Book(null,null,null,null,null,null,null);
    $user->setTitle($_POST['title']);
    $user->setAuthor($_POST['author']);
    $user->setGenre($_POST['genre']);
    $user->setDescription($_POST['description']);
    $user->setPublicationYear($_POST['publication_year']);
    $user->setTotalCopies($_POST['total_copies']);
    $user->setAvailableCopies($_POST['available_copies']);
    $bookimp = new BookController();
    $bookimp->save($user);
}