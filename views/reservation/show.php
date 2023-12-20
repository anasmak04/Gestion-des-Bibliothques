<?php

require_once "../../app/controllers/reservation/ReservationController.php";

$reservationimp = new \App\reservation\ReservationController();

$result = $reservationimp->findAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Books Management">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/styles.css">

</head>

<body>

    <h2>reservation Management</h2>

    <table>
        <?php  foreach ($result as $reservation) : ?>
        <tr>
            <th>description</th>
            <th>reservation_date</th>
            <th>return_date</th>
            <th>is_returned</th>
            <th>id_book</th>
            <th>actions</th>
        </tr>


        <tr>
            <td><?= $reservation["description"] ?></td>
            <td><?= $reservation["reservation_date"] ?></td>
            <td><?= $reservation["return_date"] ?></td>
            <td><?= $reservation["is_returned"] ?></td>
            <td><?= $reservation["id_book"] ?></td>

            <td>
                <a href="delete.php?id=<?= $reservation["id"] ?>">delete</a>
                <a href="edit.php?id=<?= $reservation["id"] ?>">edit</a>
            </td>

        </tr>

        <?php endforeach; ;?>
    </table>







</body>
</html>
