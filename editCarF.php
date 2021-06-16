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
        $carID = $_POST["carid"];


        if (empty($brand) || empty($model) || empty($year) || empty($mileage)) {
            header("Location: addCar.php?msg=Lütfen alanları tam doldurunuz!");
            exit();
        } else {
            if (!empty($_FILES["image"]['name'])) {
                $allowTypes = array('jpg', 'png');
                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                        $query = "UPDATE car SET brand='$brand',model='$model',year='$year',mileage='$mileage',image='$image'  WHERE ID= '$carID'";

                        $result = mysqli_query($connection, $query);
                        echo var_dump($result);
                        if ($result) {

                            header("Location: addCar.php?msg=Araç Başarıyla Güncellendi!");
                            exit();
                        } else {
                            header("Location: addCar.php?msg=Araç Güncellenemedi!");
                            exit();
                        }
                    }
                } else {
                    header("Location: addCar.php?msg=Resim olarak sadece png ya da jpg formatı kabul edilir");
                    exit();
                }
            } else {
                $query = "UPDATE car SET brand='$brand',model='$model',year='$year',mileage='$mileage' WHERE ID= '$carID' ";

                $result = mysqli_query($connection, $query);
                echo var_dump($result);
                if ($result) {

                    header("Location: addCar.php?msg=Araç Başarıyla Güncellendi!");
                    exit();
                } else {
                    header("Location: addCar.php?msg=Araç Güncellenemedi!");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: /loginForm.php");
    exit();
}
