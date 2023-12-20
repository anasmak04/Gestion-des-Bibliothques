<?php
use App\controllers\BookController;

$id = null;
require_once "../../app/controllers/Book/BookController.php";
$getById = new BookController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$result = $getById->findById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Books Management">
    <meta name="keywords" content="Library books">
    <meta name="author" content="Anas Elmakhloufi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
<h2>Edit</h2>

<form action="../../app/controllers/Book/BookController.php" method="post">

    <?php if ($result) : ?>
        <div class="form-group">
            <label for="title">title:</label>
            <input type="hidden" name="id" value="<?= $id ?>"  class="form-control" id="title" required/>
        </div>
        <div class="form-group">
            <label for="title">title:</label>
            <input name="title" type="text" value="<?= $result["title"] ?>" class="form-control" id="title" required>
        </div>

        <div class="form-group">
            <label for="author">author:</label>
            <input name="author" type="text" class="form-control" value="<?= $result["author"] ?>" id="author" required>
        </div>

        <div class="form-group">
            <label for="genre">genre:</label>
            <input name="genre" type="text" class="form-control" value="<?= $result["genre"] ?>" id="genre" required>
        </div>

        <div class="form-group">
            <label for="description">description:</label>
            <input name="description" type="text" class="form-control" value="<?= $result["description"] ?>" id="description" required>
        </div>

        <div class="form-group">
            <label for="publication_year">publication_year:</label>
            <input name="publication_year" type="date" class="form-control" value="<?= $result["publication_year"] ?>" id="publication_year" required>
        </div>

        <div class="form-group">
            <label for="total_copies">total_copies:</label>
            <input name="total_copies" type="number" class="form-control" value="<?= $result["total_copies"] ?>" id="total_copies" required>
        </div>

        <div class="form-group">
            <label for="available_copies">available_copies:</label>
            <input name="available_copies" type="number" class="form-control" value="<?= $result["available_copies"] ?>" id="available_copies" required>
        </div>
    <?php endif; ?>

    <button name="submit-edit" type="submit" class="btn btn-success">save</button>
</form>
</body>
</html>
