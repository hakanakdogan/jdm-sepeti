<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {

    $car_ID = $_GET["car_ID"];
    $customer_ID = $_GET["customer_ID"];
    $buy_ID = $_GET["buy_ID"];

    $query = "UPDATE buy_request SET pending=0, accepted=0, rejected=1 WHERE car_ID='$car_ID'";
    $query0 = "UPDATE buy_request SET pending=0, accepted=1, rejected=0 WHERE customer_ID='$customer_ID' AND car_ID='$car_ID' AND buy_request.ID= '$buy_ID'";
    $query1 = "UPDATE car_owner SET owner_ID='$customer_ID' WHERE car_ID='$car_ID'";
    $query2 = "UPDATE car SET isforsale=0 WHERE ID='$car_ID'";


    $result = mysqli_query($connection, $query);

    if ($result) {

        $result0 = mysqli_query($connection, $query0);

        if ($result0) {
            $result1 = mysqli_query($connection, $query1);
            if ($result1) {
                $result2 = mysqli_query($connection, $query2);
                if ($result2) {
                    header("Location: receivedOffers.php?msg=Teklifi Kabul Edildi, Satış İşlemi Gerçekleştirildi!");
                    exit();
                } else {
                    header("Location: receivedOffers.php?msg=Teklifi Kabul Ederken Bir Hata Oluştu!");
                    exit();
                }
            } else {
                header("Location: receivedOffers.php?msg=Teklifi Kabul Ederken Bir Hata Oluştu!");
                exit();
            }
        } else {
            header("Location: receivedOffers.php?msg=Teklifi Kabul Ederken Bir Hata Oluştu!");
            exit();
        }
    } else {
        header("Location: receivedOffers.php?msg=Teklifi Kabul Ederken Bir Hata Oluştu!");
        exit();
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
