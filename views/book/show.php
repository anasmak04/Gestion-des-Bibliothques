<?php

///
/// require_once __DIR__ . '/../../vendor/autoload.php';

//use App\controllers\BookController;
use App\controllers\BookController;

require_once "../../app/controllers/book/BookController.php";

$bookController = new BookController();
$books = $bookController->findAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Books Management">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

<body>

<table id="customers">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>author</th>
        <th>genre</th>
        <th>description</th>
        <th>publication year</th>
        <th>total copies</th>
        <th>available copies</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td><?= $book["id"]; ?></td>
            <td><?= $book["title"]; ?></td>
            <td><?= $book["author"]; ?></td>
            <td><?= $book["genre"]; ?></td>
            <td><?= $book["description"]; ?></td>
            <td><?= $book["publication_year"]; ?></td>
            <td><?= $book["total_copies"]; ?></td>
            <td><?= $book["available_copies"]; ?></td>
            <td>
                <a href="delete.php?id=<?= $book["id"] ?>">delete</a>
                <a href="edit.php?id=<?= $book["id"] ?>">edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
