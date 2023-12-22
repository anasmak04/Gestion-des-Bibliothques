<?php

use App\controllers\UserController;
require_once "../../../app/controllers/user/UserController.php";
$userimp = new UserController();
$users = $userimp->findAll();
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
    <title>utilisateurs</title>
    <link rel="stylesheet" href="../../../public/css/table.css">
</head>
<body>

<div class="container">
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
            <a href="../../book/show.php" target="_blank">Books</a>
            <a href="../../reservation/show.php" target="_blank">Reservation</a>
            <?php
            if($_SESSION["role"] == 1){?>
                <a href="../../admin/users/user.php" target="_blank">utilisateurs</a>
                <?php
            }
            ?>
        </div>
    </div>

    <table id="customers">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>lastname</th>
            <th>email</th>
            <th>Role id</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user["id"]; ?></td>
                <td><?= $user["name"]; ?></td>
                <td><?= $user["lastname"]; ?></td>
                <td><?= $user["email"]; ?></td>
                <td><?= $user["roleID"]; ?></td>
                <td><a class="logout" href="delete.php?id=<?= $user["id"] ?>">delete</a>
                    <a class="logout" href="edit.php?id=<?= $user["id"] ?>">edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
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

