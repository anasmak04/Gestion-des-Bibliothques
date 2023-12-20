<?php


use App\controllers\UserController;

require_once "../../../app/controllers/user/UserController.php";

$id = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$deleteuser = new UserController();
$deleteuser->deleteById($id);

?>
