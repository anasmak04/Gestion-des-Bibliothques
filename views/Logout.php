<?php
session_start();
session_destroy();
$path = "./auth/Login.php";
header("Location: ".$path);
exit();

?>
