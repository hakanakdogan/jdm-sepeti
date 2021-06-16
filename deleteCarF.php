<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {
    $carid = $_GET["carid"];
    $location = $_GET["location"];
    $currentUser = $_GET["userID"];



    $query = "DELETE FROM car_owner WHERE owner_ID='$currentUser' AND car_ID='$carid'";
    $query1 = "DELETE FROM buy_request WHERE car_ID='$carid' AND owner_ID='$currentUser'";
    $query2 = "DELETE FROM car WHERE ID='$carid'";


    $result = mysqli_query($connection, $query);

    if ($result) {
        $result1 = mysqli_query($connection, $query1);
        if ($result1) {
            $result2 = mysqli_query($connection, $query2);
            if ($result2) {
                header("Location: $location?msg=Araç Başarıyla Silindi!");
                exit();
            } else {
                header("Location: $location?msg=Araç Silinemedi!");
                exit();
            }
        } else {
            header("Location: $location?msg=Araç Silinemedi!");
            exit();
        }
    } else {
        header("Location: $location?msg=Araç Silinemedi!");
        exit();
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
