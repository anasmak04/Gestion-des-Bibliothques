<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="description" content="Register Authentification">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../public/css/styles.css">


</head>
<body>
<h2>Register</h2>
<div id="particles-js"></div>




    <form action="../../app/controllers/auth/RegisterController.php" method="post">

        <div class="form-group">
            <label for="name">name :</label>
            <input type="text" name="name" class="form-control"  id="name" required>
        </div>

        <div class="form-group">
            <label for="lastname">lastname:</label>
            <input name="lastname" type="text" class="form-control"  id="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input name="email" type="text" class="form-control" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input name="password" type="password" class="form-control"  id="password" required>
        </div>
        <button name="submit" type="submit" class="btn btn-success">Register</button>
    </form>


</body>
</html>


