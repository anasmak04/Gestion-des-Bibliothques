<?php

use App\controllers\UserController;

require_once "../../../app/controllers/user/UserController.php";

$id = null;

$userimp = new UserController();
$userimp2 = new UserController();

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$result1 = $userimp->findById($id);
$result2 = $userimp2->findById2($id);

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
    <link rel="stylesheet" href="../../../public/css/styles.css">

</head>

<body>
<h2>Books Management</h2>
<form action="../../../app/controllers/user/UserController.php" method="post">

    <?php foreach ($result1 as $result11) : ?>

        <input type="hidden" name="id" value="<?= $result11["id"] ?>" />


        <div class="form-group">
        <label for="name">name:</label>
        <input name="name" type="text" class="form-control" value="<?= $result11["name"] ?>"  id="name" required>
    </div>

    <div class="form-group">
        <label for="lastname">lastname:</label>
        <input name="lastname" type="text" class="form-control" value="<?= $result11["lastname"] ?>"  id="lastname" required>
    </div>

    <div class="form-group">
        <label for="email">email:</label>
        <input name="email" type="text" class="form-control" value="<?= $result11["email"] ?>"  id="email" required>
    </div>

    <div class="form-group">
        <label for="password">password:</label>
        <input name="password" type="password" class="form-control" value="<?= $result11["password"] ?>"  id="password" required>
    </div>

    <div class="form-group">
        <label for="phone">phone:</label>
        <input name="phone" type="text" class="form-control" value="<?= $result11["phone"] ?>"  id="phone" required>
    </div>


    <div class="form-group">
        <label for="budget">budget:</label>
        <input name="budget" type="text" class="form-control" value="<?= $result11["budget"] ?>"  id="budget" required>
    </div>

    <?php endforeach; ?>


    <?php foreach($result2 as $role) : ?>

        <input type="hidden" name="id" value="<?= $role["id_user"] ?>" />

        <div class="form-group">
        <label for="role id">role id :</label>
        <input name="id_role" type="number" class="form-control" value="<?= $role["id_role"] ?>"  id="role_id" required>

    </div>

    <?php endforeach; ?>

    <button name="edit-user" type="submit" class="btn btn-success">edit</button>
</form>
</body>
</html>