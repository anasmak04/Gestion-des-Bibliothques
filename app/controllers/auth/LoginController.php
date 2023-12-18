<?php

require_once "../../database/DbConfig.php";
session_start();

class LoginController
{
    private $database;

    public function __construct()
    {
        $dbconfig = new DbConfig();
        $this->database = $dbconfig->getConnection();
    }

    public function LogToAccount($email, $password)
    {
        $sql = "SELECT email, password, userole.id_role as roleID FROM user INNER JOIN userole on user.id = userole.id_user WHERE email = :email";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $currentpwd = $result["password"];
            $_SESSION["role"] = $result["roleID"];

            if (password_verify($password, $currentpwd)) {
                if ($_SESSION["role"] == 2) {
                    $path = "../../../views/auth/user/user.php";
                    header("Location: " . $path);
                    exit();

                } else {
                    echo "admin";
                }
            }
        }
    }
}

if (isset($_POST['submit-log'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginController = new LoginController();
    $loginController->LogToAccount($email, $password);
}
?>
