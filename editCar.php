<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) { ?>

    <?php if ($_GET["ownerid"] === $_SESSION["ID"]) { ?>
        <?php

        $query = "SELECT * FROM car WHERE ID=" . $_GET["carid"];
        $result = mysqli_query($connection, $query);

        if ($result) {
            $gelen = mysqli_fetch_array($result);

        ?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                <link href="./style.css" rel="stylesheet" />
                <title>Araç Düzenle</title>
            </head>

            <body>
                <?php include "./nav/navbarauth.php" ?>

                <div class="container d-flex align-items-center justify-content-center mt-5 container_login">
                    <form action="editCarF.php" method="POST" class="form_login" enctype="multipart/form-data">




                        <div class="d-flex align-items-center justify-content-center mt-5">
                            <h1>Aracınızı Düzenleyin</h1>
                        </div>
                        <?php if (isset($_GET["msg"])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET["msg"] ?>
                            </div>
                        <?php } ?>
                        <div class="container mt-5">

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Aracınızın Resmini Seçin</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">

                            </div>
                            <small>Araç Resmini değiştirmek istemiyorsanız lütfen bu kısmı değiştirmeyin!</small>
                            <div class="form-group">
                                <input name="carid" value=<?php echo $_GET["carid"] ?> readonly class="hide">
                                <label for="exampleFormControlSelect1">Marka Seçiniz</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand">
                                    <option <?php if ($gelen["brand"] == 'Toyota') {
                                                echo ("selected");
                                            } ?>>Toyota</option>
                                    <option <?php if ($gelen["brand"] == 'Nissan') {
                                                echo ("selected");
                                            } ?>>Nissan</option>
                                    <option <?php if ($gelen["brand"] == 'Honda') {
                                                echo ("selected");
                                            } ?>>Honda</option>
                                    <option <?php if ($gelen["brand"] == 'Lexus') {
                                                echo ("selected");
                                            } ?>>Lexus</option>
                                    <option <?php if ($gelen["brand"] == 'Mazda') {
                                                echo ("selected");
                                            } ?>>Mazda</option>
                                    <option <?php if ($gelen["brand"] == 'Acura') {
                                                echo ("selected");
                                            } ?>>Acura</option>
                                    <option <?php if ($gelen["brand"] == 'Mitsubishi') {
                                                echo ("selected");
                                            } ?>>Mitsubishi</option>
                                    <option <?php if ($gelen["brand"] == 'Subaru') {
                                                echo ("selected");
                                            } ?>>Subaru</option>
                                    <option <?php if ($gelen["brand"] == 'Suzuki') {
                                                echo ("selected");
                                            } ?>>Suzuki</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput">Model Giriniz</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Model" name="model" value=" <?php echo $gelen["model"] ?> ">
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput">Araç Üretim Yılını Giriniz</label>
                                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Yıl" name="year" value=<?php echo $gelen["year"] ?>>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput">Araç Kilometresini Giriniz</label>
                                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Kilometre" name="mileage" value=<?php echo $gelen["mileage"] ?>>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Aracı Güncelle</button>

                        </div>


                    </form>
                </div>





                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

            </body>

            </html>
        <?php } else {
            echo '<br>Hata:' . mysqli_error($connection);
        } ?>

    <?php } else {
        header("Location: /home.php");
        exit();
    } ?>

<?php
} else {
    header("Location: /loginForm.php");
    exit();
}
?>