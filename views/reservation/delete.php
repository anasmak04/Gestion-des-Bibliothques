<?php

    require_once "../../app/controllers/reservation/ReservationController.php";

    $id = null;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

    $reservationimp = new \App\reservation\ReservationController();
    $reservationimp->deleteById($id);
    header("Location: show.php");
    exit();
?>
