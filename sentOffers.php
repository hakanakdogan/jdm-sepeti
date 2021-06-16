<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) {
    $currentUser = $_SESSION["ID"];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="./style.css" rel="stylesheet" />
        <title>Araç Ekle</title>
    </head>

    <body>
        <?php include "./nav/navbarauth.php" ?>
        <div class="alert alert-info" role="alert">
            <center>
                <h1>Gönderdiğiniz Teklifler;</h1>

            </center>
        </div>
        <?php
        $query = "SELECT pending, accepted, rejected, price, buy_request.owner_ID,buy_request.customer_ID, users.name AS owner_name, car.brand, car.model FROM ((buy_request
        INNER JOIN users ON users.ID=buy_request.owner_ID)
        INNER JOIN car ON  car.ID=buy_request.car_ID) WHERE buy_request.customer_ID='$currentUser' ORDER BY buy_request.ID DESC";

        $result = mysqli_query($connection, $query);

        if (!$result) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "Bir Hata Oluştu" ?>
            </div>
        <?php } ?>

        <?php
        if (mysqli_num_rows($result) <= 0) { ?>
            <div class="alert alert-info" role="alert">
                <?php echo "Görünüşe göre hiç teklif yapmamışsınız." ?>
            </div>
        <?php } ?>
        <center>
            <div class="row row-cols-1 row-cols-md-5 cardContainer mt-5 ">
                <?php
                while ($gelen = mysqli_fetch_array($result)) {


                ?>

                    <?php

                    if ($gelen["pending"] == 1) { ?>
                        <div class="col mb-4">
                            <div class="center">
                                <div class="card text-white bg-warning mb-3 h-100 w-100 " style="max-width: 18rem;">
                                    <div class="card-header">Beklemede</div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <p>Araç: <b><?php echo $gelen["brand"] ?> <?php echo $gelen["model"] ?></b> </p>
                                        </h5>
                                        <p class="card-text">Teklif Edilen Fiyat: <b><?php echo $gelen["price"] ?>$</b> </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted" style="color: white !important;"> Satıcı: <?php echo $gelen["owner_name"]   ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($gelen["accepted"] == 1 && $gelen["rejected"] == 0) { ?>
                        <div class="col mb-4">
                            <div class="center">
                                <div class="card text-white bg-success mb-3 h-100" style="max-width: 18rem;">
                                    <div class="card-header">Kabul Edildi</div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <p>Araç: <b><?php echo $gelen["brand"] ?> <?php echo $gelen["model"] ?></b> </p>
                                        </h5>
                                        <p class="card-text">Teklif Edilen Fiyat: <b><?php echo $gelen["price"] ?>$</b> </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted" style="color: white !important;"> Satıcı: <?php echo $gelen["owner_name"]   ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col mb-4">
                            <div class="center">
                                <div class="card text-white bg-danger mb-3 h-100" style="max-width: 18rem;">
                                    <div class="card-header">Reddedildi</div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <p>Araç: <b><?php echo $gelen["brand"] ?> <?php echo $gelen["model"] ?></b> </p>
                                        </h5>
                                        <p class="card-text">Teklif Edilen Fiyat: <b><?php echo $gelen["price"] ?>$</b> </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted" style="color: white !important;"> Satıcı: <?php echo $gelen["owner_name"]   ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>






                <?php } ?>

            </div>
        </center>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>

    </html>




<?php
} else {
    header("Location: /loginForm.php");
    exit();
}
?>