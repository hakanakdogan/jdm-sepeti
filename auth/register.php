<?php
session_start();
include "../db.php";
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"])) {

    function isValid($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = isValid($_POST["email"]);
    $password = isValid($_POST["password"]);
    $name = $_POST["name"];

    if (empty($email) || empty($password) || empty($name)) {
        header("Location: /registerForm.php?msg=İsim, E-mail Ve Şifre Alanları Zorunludur");
        exit();
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo $hashedPassword;

        $query = "INSERT INTO users (email,password,name) VALUES('$email','$hashedPassword', '$name')";



        if (mysqli_query($connection, $query)) {
            header("Location: /loginForm.php?msg=Kayıt Başarılı Lütfen Giriş Yapınız");
            exit();
        } else {
            header("Location: /registerForm.php?msg=Kayıt Başarısız!");
            exit();
        }
    }
} else {
    header("Location: /registerForm.php?msg");
    exit();
}
