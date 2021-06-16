<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {
    if (isset($_POST["submit"])  && isset($_POST["brand"])  && isset($_POST["model"])  && isset($_POST["year"])  && isset($_POST["mileage"])) {

        $target = "img/" . basename($_FILES['image']['name']);
        $fileType = pathinfo($target, PATHINFO_EXTENSION);

        $image = $_FILES['image']['name'];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $mileage = $_POST["mileage"];


        if (empty($brand) || empty($model) || empty($year) || empty($mileage) || empty($_FILES["image"]['name'])) {
            header("Location: addCar.php?msg=Lütfen alanları tam doldurunuz!");
            exit();
        } else {
            $allowTypes = array('jpg', 'png');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                    $query = "INSERT INTO car (brand,model,year,mileage,isforsale,image) VALUES ('$brand', '$model', '$year', '$mileage', 1, '$image' )";

                    $result = mysqli_query($connection, $query);
                    echo var_dump($result);
                    if ($result) {
                        $last_id = mysqli_insert_id($connection);

                        $userID = $_SESSION["ID"];

                        $query1 = "INSERT INTO car_owner (car_ID, owner_ID) VALUES('$last_id','$userID')";
                        $result1 = mysqli_query($connection, $query1);

                        if ($result1) {
                            header("Location: addCar.php?msg=Araç Başarıyla Eklendi!");
                            exit();
                        } else {
                            header("Location: addCar.php?msg=Araç Eklenemedi!");

                            exit();
                        }
                    } else {
                        header("Location: addCar.php?msg=Araç Eklenemedi!");
                        exit();
                    }
                }
            } else {
                header("Location: addCar.php?msg=Resim olarak sadece png ya da jpg formatı kabul edilir");
                exit();
            }
        }
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
