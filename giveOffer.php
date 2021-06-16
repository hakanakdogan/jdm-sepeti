<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {
    $ownerID = $_POST["ownerID"];
    $customerID = $_POST["customerID"];
    $carID = $_POST["carID"];
    $price = $_POST["price"];

    echo "Owner ID: " . $ownerID;
    echo "Customer ID: " . $carID;
    echo "Car ID: " . $carID;
    echo "Price: " . $price;


    $query = "INSERT INTO buy_request (owner_ID,customer_ID,car_ID,pending,accepted,rejected,price) VALUES ('$ownerID','$customerID ','$carID',1,0,0,'$price') ";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: home.php?msg=Teklif Başarıyla Gönderildi!");
        exit();
    } else {
        header("Location: home.php?msg=teklif Gönderilemedi!");
        exit();
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
