<?php
session_start();
include("db.php");
if (isset($_SESSION["ID"]) && isset($_SESSION["name"])) { ?>


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

        <div class="container d-flex align-items-center justify-content-center mt-5 container_login">
            <form action="addCarF.php" method="POST" class="form_login" enctype="multipart/form-data">




                <div class="d-flex align-items-center justify-content-center mt-5">
                    <h1>Araç Ekle</h1>
                </div>
                <?php if (isset($_GET["msg"])) { ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $_GET["msg"] ?>
                    </div>
                <?php } ?>
                <div class="container mt-5">

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Aracınızın Resmini Seçin</label> <br>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Marka Seçiniz</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="brand">
                            <option>Toyota</option>
                            <option>Nissan</option>
                            <option>Honda</option>
                            <option>Lexus</option>
                            <option>Mazda</option>
                            <option>Acura</option>
                            <option>Mitsubishi</option>
                            <option>Subaru</option>
                            <option>Suzuki</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput">Model Giriniz</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Marka" name="model">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput">Araç Üretim Yılını Giriniz</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Model" name="year">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput">Araç Kilometresini Giriniz</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Kilometre" name="mileage">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Araç Ekle</button>

                </div>


            </form>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>

    </html>




<?php
} else {
    header("Location: /loginForm.php");
    exit();
}
?>