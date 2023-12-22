<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Books Management">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilidateurs</title>
    <link rel="stylesheet" href="../../../public/css/styles.css">

</head>

<body>
<h2>Books Management</h2>

<form action="../../../app/controllers/user/UserController.php" method="post">

    <div class="form-group">
        <label for="name">name:</label>
        <input name="name" type="text" class="form-control"  id="name" required>
    </div>

    <div class="form-group">
        <label for="lastname">lastname:</label>
        <input name="lastname" type="text" class="form-control"  id="lastname" required>
    </div>

    <div class="form-group">
        <label for="email">email:</label>
        <input name="email" type="text" class="form-control"  id="email" required>
    </div>

    <div class="form-group">
        <label for="password">password:</label>
        <input name="password" type="password" class="form-control"  id="password" required>
    </div>

    <div class="form-group">
        <label for="phone">phone:</label>
        <input name="phone" type="text" class="form-control"  id="phone" required>
    </div>

    <div class="form-group">
        <label for="phone">phone:</label>
        <input name="phone" type="text" class="form-control"  id="phone" required>
    </div>

    <div class="form-group">
        <label for="budget">budget:</label>
        <input name="budget" type="text" class="form-control"  id="budget" required>
    </div>


    <div class="form-group">
        <label for="role id">role id :</label>
        <input name="role_id" type="number" class="form-control"  id="role_id" required>
    </div>



    <button name="submit-user" type="submit" class="btn btn-success">Register</button>
</form>
</body>
</html>
