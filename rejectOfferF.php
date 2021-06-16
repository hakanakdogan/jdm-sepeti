<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {
    $car_ID = $_GET["car_ID"];
    $customer_ID = $_GET["customer_ID"];
    $buy_ID = $_GET["buy_ID"];


    $query = "UPDATE buy_request SET pending=0, accepted=0, rejected=1 WHERE customer_ID='$customer_ID' AND car_ID='$car_ID' AND buy_request.ID= '$buy_ID'";



    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: receivedOffers.php?msg=Teklif Başarıyla Reddedildi!");
        exit();
    } else {
        header("Location: receivedOffers.php?msg=Teklifi Reddederken Bir Hata Oluştu!");
        exit();
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
