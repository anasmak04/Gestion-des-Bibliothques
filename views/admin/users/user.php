<?php

use App\controllers\UserController;

require_once "../../../app/controllers/user/UserController.php";
$userimp = new UserController();
$users = $userimp->findAll();

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
    <link rel="stylesheet" href="../../../public/css/styles.css">
</head>

<body>

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
            <td><a class="button" href="delete.php?id=<?= $user["id"] ?>">delete</a>
                <a class="button" href="edit.php?id=<?= $user["id"] ?>">edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

