<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet" />
    <title>Login</title>
</head>

<body>
    <?php include "./nav/navbar.php" ?>

    <div class="container d-flex align-items-center justify-content-center mt-5 container_login">
        <form action="./auth/login.php" method="POST" class="form_login">




            <div class="d-flex align-items-center justify-content-center mt-5">
                <h1>Giriş Yap</h1>
            </div>
            <?php if (isset($_GET["msg"])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET["msg"] ?>
                </div>
            <?php } ?>
            <div class="container mt-5">


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                    <input type="email" placeholder="E-mail" class="form-control" name="email">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" placeholder="Şifre" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Giriş Yap</button>

            </div>


        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>