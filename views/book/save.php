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
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/styles.css">

</head>

<body>
<h2>Books Management</h2>

<form action="../../app/controllers/book/BookController.php" method="post">

    <div class="form-group">
        <label for="title">title:</label>
        <input name="title" type="text" class="form-control"  id="title" required>
    </div>

    <div class="form-group">
        <label for="author">author:</label>
        <input name="author" type="text" class="form-control"  id="author" required>
    </div>

    <div class="form-group">
        <label for="genre">genre:</label>
        <input name="genre" type="text" class="form-control"  id="genre" required>
    </div>

    <div class="form-group">
        <label for="description">description:</label>
        <input name="description" type="text" class="form-control"  id="description" required>
    </div>


    <div class="form-group">
        <label for="publication_year">publication_year:</label>
        <input name="publication_year" type="date" class="form-control"  id="publication_year" required>
    </div>

    <div class="form-group">
        <label for="total_copies">total_copies:</label>
        <input name="total_copies" type="number" class="form-control"  id="total_copies" required>
    </div>

    <div class="form-group">
        <label for="available_copies">available_copies:</label>
        <input name="available_copies" type="number" class="form-control"  id="available_copies" required>
    </div>

    <button name="edit-submit" type="submit" class="btn btn-success">Register</button>

</form>
</body>
</html>
