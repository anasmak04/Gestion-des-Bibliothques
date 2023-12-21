<?php

///
/// require_once __DIR__ . '/../../vendor/autoload.php';
//use App\controllers\BookController;
use App\controllers\BookController;
require_once "../../app/controllers/book/BookController.php";
$bookController = new BookController();
$books = $bookController->findAll();
session_start();

?>


<a href="../Logout.php">Logout</a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Books Management">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="../../public/css/table.css">
</head>
<body>


    <input class="table" type="text" id="searchInput" placeholder="Search for books">


<table class="table" id="customers">
    <thead>
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
    </thead>
    <tbody>
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
                <?php
                if ($_SESSION["role"] == 1) { ?>
                    <a href="delete.php?id=<?= $book["id"] ?>">delete</a>
                    <a href="edit.php?id=<?= $book["id"] ?>">edit</a>
                <?php } else { ?>
                    <a class="button" href="../reservation/save.php">book now</a>
                <?php } ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>

    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('#customers tr:nth-child(n+2)');
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            if (rowText.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
