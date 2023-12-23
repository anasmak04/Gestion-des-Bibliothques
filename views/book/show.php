<?php

/// require_once __DIR__ . '/../../vendor/autoload.php';
//use App\controllers\BookController;

use App\controllers\BookController;
require_once "../../app/controllers/book/BookController.php";
$bookController = new BookController();
$books = $bookController->findAll();
session_start();




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
    <link rel="stylesheet" href="../../public/css/table.css">
</head>
<body>

<div class="container">
    <h2>books management</h2>
    <a class="logout" href="../Logout.php">Logout</a>
    <input class="input" type="text" id="searchInput" placeholder="Search for books">

    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                Sona Code
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-links">
            <a href="../book/show.php" target="_blank">Books</a>
            <?php
            if($_SESSION["role"] == 1){?>
            <a href="../reservation/show.php" target="_blank">Reservation</a>
                <?php
            }
            ?>

            <?php
            if($_SESSION["role"] == 1){?>
            <a href="../admin/users/user.php" target="_blank">utilisateurs</a>
        <?php
            }
        ?>

        </div>
    </div>
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
                        <a class="logout" href="delete.php?id=<?= $book["id"] ?>">delete</a>
                        <a class="logout" href="edit.php?id=<?= $book["id"] ?>">edit</a>
                    <?php } else { ?>
                        <a class="logout" href="../reservation/save.php?id=<?= $book["id"] ?>">book now</a>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>




    <script>
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll('#customers tbody tr');
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