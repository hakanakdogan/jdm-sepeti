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
        <title>Home</title>
    </head>

    <body>
        <?php include "./nav/navbarauth.php"    ?>

        <div class="alert alert-info" role="alert">
            <center>
                <h1>Hoşgeldin, <?php echo $_SESSION["name"] ?>.</h1>
                <h4>Yayındaki araçlara bir göz at;</h4>
            </center>
        </div>


        <?php if (isset($_GET["msg"])) { ?>
            <div class="alert alert-info" role="alert">
                <?php echo $_GET["msg"] ?>
            </div>
        <?php } ?>
        <?php
        $query = "select car.ID AS car_ID ,brand,model,year,mileage,image, users.name, car_owner.owner_ID AS ownerID, isforsale from ((car inner join car_owner on car_owner.car_ID=car.ID )inner join users on users.ID= car_owner.owner_ID ) ORDER BY car.ID DESC";

        $result = mysqli_query($connection, $query);

        if (!$result) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "Bir Hata Oluştu" ?>
            </div>
        <?php } ?>





        <div class="row row-cols-1 row-cols-md-2 cardContainer">
            <?php

            while ($gelen = mysqli_fetch_array($result)) {
                if ($gelen["isforsale"] == 1) {
                    $imageUrl = 'img/' . $gelen["image"];
            ?>

                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src=" <?php echo $imageUrl ?> " class="card-img-top d-block w-100 responsive_img_card img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $gelen["brand"] . " " . $gelen["model"] ?> </h5>
                                <p class="card-text">Yıl: <?php echo $gelen["year"] ?> Km: <?php echo $gelen["mileage"] ?> </p>
                                <?php
                                if ($gelen["ownerID"] === $_SESSION["ID"]) { ?>
                                    <a class="btn btn-danger" href="deleteCarF.php?carid= <?php echo $gelen['car_ID'] ?>&userID=<?php echo $currentUser ?>&location=home.php " role="button">Aracı Sil</a>
                                    <a class="btn btn-warning" href="editCar.php?carid=<?php echo $gelen['car_ID'] ?>&ownerid=<?php echo $gelen["ownerID"] ?> " role="button">Düzenle</a>

                                    <?php if ($gelen["isforsale"] == 1) { ?>
                                        <a class="btn btn-warning" href="removePublishF.php?carid= <?php echo $gelen['car_ID'] ?>&location=home.php " role="button">Aracı Yayından Kaldır</a>
                                    <?php } ?>


                                <?php } else { ?>
                                    <form action="giveOffer.php" method="POST">
                                        <input name="ownerID" value=<?php echo $gelen["ownerID"] ?> readonly class="hide">
                                        <input name="customerID" value=<?php echo $currentUser ?> readonly class="hide">
                                        <input name="carID" value=<?php echo $gelen["car_ID"] ?> readonly class="hide">
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="1" aria-label="Dollar amount " name="price">
                                            <span class="input-group-text">$</span>
                                            <button class="btn btn-success" type="submit" id="button-addon2">Teklif Yap!</button>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted"> Satıcı: <?php echo $gelen["name"]   ?> </small>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            <?php } ?>
        </div>

        <?php
        mysqli_close($connection);
        ?>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
} else {
    header("Location: /loginForm.php");
    exit();
}
?>