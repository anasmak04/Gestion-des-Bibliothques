<?php

use App\controllers\BookController;

require_once "../../app/controllers/Book/BookController.php";

$id = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$deletebook = new BookController();

$deletebook->deleteById($id);

?>