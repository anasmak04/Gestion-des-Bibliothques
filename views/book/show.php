<?php

use App\controllers\BookController;

require_once "../../app/controllers/Book/BookController.php";

$bookController = new BookController();
$books = $bookController->findAll(); // Fetch all books

?>

<table>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>author</th>
        <th>genre</th>
        <th>description</th>
        <th>publication year</th>
        <th>total copies</th>
        <th>available copies</th>
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
        </tr>
    <?php endforeach; ?>
</table>
