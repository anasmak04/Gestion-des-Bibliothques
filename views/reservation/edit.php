<?php

require_once "../../app/controllers/reservation/ReservationController.php";
$reservationimp = new \App\reservation\ReservationController();

$id = null;

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$result =$reservationimp->findById($id);
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

<form action="../../app/controllers/reservation/ReservationController.php" method="post">

    <?php if ($result) : ?>

        <input name="description" type="hidden" value="<?= $id ?>" >


        <div class="form-group">
        <label for="description">description:</label>

        <input name="description" type="text" value="<?= $result["description"] ?>" class="form-control"  id="description" required>
    </div>

    <div class="form-group">
        <label for="reservation_date">reservation_date:</label>
        <input name="reservation_date" type="text" value="<?= $result["reservation_date"] ?>" class="form-control"  id="reservation_date" required>
    </div>

    <div class="form-group">
        <label for="return_date">return_date:</label>
        <input name="return_date" type="date" class="form-control" value="<?= $result["return_date"] ?>"  id="return_date" required>
    </div>

    <div class="form-group">
        <label for="is_returned">is returned:</label>
        <input name="is_returned" type="number" class="form-control" value="<?= $result["is_returned"] ?>"  id="is_returned" required>
    </div>


    <div class="form-group">
        <label for="id_book">id_book:</label>
        <input name="id_book" type="number" class="form-control" value="<?= $result["id_book"] ?>"  id="id_book" required>
    </div>

    <?php endif; ?>

    <button name="edit-submit" type="submit" class="btn btn-success">save</button>

</form>
</body>
</html>
