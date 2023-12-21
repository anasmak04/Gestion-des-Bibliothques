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
    <meta name="description" content="Books Management">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../../public/css/table.css">

</head>

<body>

<p>the most book reserved</p>

<table>
   <thead>
   <tr>
       <th>book name</th>
       <th>number of reservations</th>
   </tr>
   </thead>

   <tbody>
   <tr>

       <?php if($result2): ?>

           <td><?=  $result2["title"] ?></td>
           <td><?= $result2["reservation_count"] ?></td>

       <?php endif; ?>

   </tr>
   </tbody>
</table>

<h2>reservation Management</h2>

    <table id="customers">
        <?php  foreach ($result as $reservation) : ?>
     <thead>
     <tr>
         <th>description</th>
         <th>reservation_date</th>
         <th>return_date</th>
         <th>is_returned</th>
         <th>id_book</th>
         <th>actions</th>
     </tr>
     </thead>


       <tbody>
       <tr>
           <td><?= $reservation["description"] ?></td>
           <td><?= $reservation["reservation_date"] ?></td>
           <td><?= $reservation["return_date"] ?></td>
           <td><?= $reservation["is_returned"] ?></td>
           <td><?= $reservation["id_book"] ?></td>

           <td>
               <?php

               if ($_SESSION["role"] == 1) { ?>
                   <a class="button" href="delete.php?id=<?= $reservation["id"] ?>">delete</a>
                   <a class="button" href="edit.php?id=<?= $reservation["id"] ?>">edit</a>
               <?php } ?>
           </td>


       </tr>
       </tbody>

        <?php endforeach; ;?>
    </table>

</body>
</html>
