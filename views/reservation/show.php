<?php
session_start();
require_once "../../app/controllers/reservation/ReservationController.php";
$reservationimp = new \App\reservation\ReservationController();
$result = $reservationimp->findAll();
$result2 = $reservationimp->getTheMostReservation();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Reservation Management">
    <meta name="keywords" content="Library, Reservation">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../../public/css/table.css">
</head>
<body>


<div class="container">
    <h2>Reservation Management</h2>
    <a class="logout" href="../Logout.php">Logout</a>
    <input class="input" type="text" id="searchInput" placeholder="Search for reservations">


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
            <a  href="../book/show.php" target="_blank">Books</a>
            <a  href="../reservation/show.php" target="_blank">Reservation</a>
            <?php
            if($_SESSION["role"] == 1){?>
                <a  href="../admin/users/user.php" target="_blank">utilisateurs</a>
                <?php
            }
            ?>
        </div>

    </div>

    <table id="customers">
        <p>the most reservation</p>
        <thead>
        <tr>
            <th>book name</th>
            <th>count of reservation</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach ($result2 as $reservation) : ?>
            <tr>
                <td><?= $reservation["bookname"] ?></td>
                <td><?= $reservation["reservation_count"] ?></td>
                <td>
                    <?php if ($_SESSION["role"] == 1) { ?>
                        <a class="logout" href="delete.php?id=<?= $reservation["id"] ?>">delete</a>
                        <a class="logout" href="edit.php?id=<?= $reservation["id"] ?>">edit</a>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <table id="customers">
        <thead>
        <tr>
            <th>Description</th>
            <th>Reservation Date</th>
            <th>Return Date</th>
            <th>Is Returned</th>
            <th>Book ID</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $reservation) : ?>
            <tr>
                <td><?= $reservation["description"] ?></td>
                <td><?= $reservation["reservation_date"] ?></td>
                <td><?= $reservation["return_date"] ?></td>
                <td><?= $reservation["is_returned"] ?></td>
                <td><?= $reservation["id_book"] ?></td>
                <td>
                    <?php if ($_SESSION["role"] == 1) { ?>
                        <a class="logout" href="delete.php?id=<?= $reservation["id"] ?>">delete</a>
                        <a class="logout" href="edit.php?id=<?= $reservation["id"] ?>">edit</a>
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
