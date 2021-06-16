<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="indexBody">
    <?php include "./nav/navbar.php" ?>

    <div id="carouselExampleCaptions" class="carousel slide carousel_body" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img//supra.jpg" class="d-block w-100 responsive_img img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>JDM NEDİR?</h5>
                    <p>Japon iç pazarı veya JDM, Japon üreticilerin araçları için ana pazarı ifade eder. JDM araçları, Japonya'daki kanuni düzenlemelere uymaları ve Japon müşterilerin ihtiyaçlarını karşılamaları için Japonya dışına aynı isimle pazarlanan araçlardan farklı özellikler içerebilir.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img//rx7.jpg" class="d-block w-100 responsive_img img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>JDM SEPETİ NEDİR?</h5>
                    <p>JDM SEPETİ sadece Japon üreticiler tarafından üretilen araçların alışverişinin yapıldığı bir online pazardır.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img//r34.jpg" class="d-block w-100 responsive_img img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>JDM SEPETİ'Nİ NASIL KULLANIRIM</h5>
                    <p>JDM SEPETİ'ni kullanabilmek için öncelikle siteye kayıt olmalısınız. Kayıt olduktan sonra bilgilerinizle giriş yapabilir, siteye araç ekleyebilir, eklediğiniz araçları satışa koyup/kaldırabilir, başka araçlara teklif verebilir ya da araçlarınıza gelen teklifleri kabul/red edebilirsiniz.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>