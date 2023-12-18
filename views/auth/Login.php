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
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/styles.css">

</head>

<body>
<h2>Login</h2>

<form action="../../app/controllers/auth/LoginController.php" method="post">

    <div class="form-group">
        <label for="email">email:</label>
        <input name="email" type="text" class="form-control"  id="email" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input name="password" type="password" class="form-control"  id="password" required>
    </div>
    <!-- Add other registration fields as needed -->
    <button name="submit-log" type="submit" class="btn btn-success">Register</button>
</form>
</body>
</html>

