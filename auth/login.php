<?php
session_start();
include "../db.php";
if (isset($_POST["email"]) && isset($_POST["password"])) {

    function isValid($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = isValid($_POST["email"]);
    $password = isValid($_POST["password"]);

    if (empty($email) || empty($password)) {
        header("Location: /forms/loginForm.php?msg=E-mail Ve Şifre Alanları Zorunludur");
        exit();
    } else {
        $query = "SELECT * FROM users WHERE email= '$email'";


        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row["email"] === $email && password_verify($password, $row["password"])) {
                $_SESSION["email"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["ID"] = $row["ID"];
                header("Location: /home.php");
                exit();
            } else {
                header("Location: /forms/loginForm.php?msg=Giriş Başarısız!");
                exit();
            }
        } else {
            header("Location: /forms/loginForm.php?msg=Giriş Başarısız!");
            exit();
        }
    }
} else {
    header("Location: /forms/loginForm.php?msg");
    exit();
}
