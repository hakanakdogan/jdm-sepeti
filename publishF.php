<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {
    $carid = $_GET["carid"];
    $location = $_GET["location"];


    $query = "UPDATE car SET isforsale=1 WHERE ID= '$carid' ";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: $location?msg=Araç Başarıyla Yayımlandı!");
        exit();
    } else {
        header("Location: $location?msg=Araç Yayımlanamadı!");
        exit();
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
