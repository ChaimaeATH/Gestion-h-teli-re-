<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUZE - À propos</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> <!-- swiper from swiperjs.com cdn -->
    <?php require('inc/links.php'); ?>
    <style>
      .box{
        border-top-color: var(--teal) !important;
      }
    </style>
</head>
<body class="bg-light">

  <?php require('inc/header.php'); ?> <!-- header link -->

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">À propos de nous</h2>
    <div class="h-line bg-dark"></div> <!-- doesnt work -->
    <p class="text-center mt-3">
    Marque emblématique de l’hôtellerie marocaine, Amuze Hotel représente un art de vivre,
       des valeurs et des traditions d’excellence.<br>
       Elle est aussi le fruit d’une vision et possède des fondations solides.
    </p>
  </div>
  
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3">MOT DU DIRECTEUR</h3>
        <p>
        Diriger cet hôtel est pour moi un défi, un engagement important, qui comprend la coordination, la formation, la motivation de mes collaborateurs, composé de personnes compétents et qualifier et qui travaillent avec passion, dont l’objectif est d’être à l’écoute de notre clientèle.<br><br>

Notre objectif est celui de vous faire sentir comme chez vous, en vous assurant l’efficacité d’un service de qualité associé à une expérience unique.<br><br>

Nous nous sommes toujours attachés à les meilleures prestations au meilleurs prix et sommes constamment à la recherche d’amélioration pour le confort de nos hôtes.<br><br>

Que vous veniez pour la première fois ou que vous soyez un visiteur fréquent, nous aurons toujours à cœur de vous proposer le meilleur service dans une atmosphère confortable et personnalisée.<br>
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="images/about/1.png" class="w-100">
      </div>
    </div>
  </div>

  <div class="container mt-5">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div class="bf-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="images/about/2.png" width="70px">
            <h4 CLASS="mt-3">+100 CHAMBRES</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div class="bf-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="images/about/3.png" width="70px">
            <h4 CLASS="mt-3">+2500 CLIENTS</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div class="bf-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="images/about/4.png" width="70px">
            <h4 CLASS="mt-3">+853 AVIS</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div class="bf-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="images/about/5.png" width="70px">
            <h4 CLASS="mt-3">+82 PERSONNELS</h4>
          </div>
        </div>
      </div>
  </div>

  <h3 class="my-5 fw-bold h-font text-center">Notre Équipe</h3>

  <div class="container px-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper mb-5">
          <?php 
            $about_r = selectAll('team_details');
            $path=ABOUT_IMG_PATH;
            while($row = mysqli_fetch_assoc($about_r)){
              echo<<<data
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                  <img src="$path$row[picture]" class="w-100">
                  <h5 class="mt-2">$row[name]</h5>
                </div>
              data;
            }

          ?>
          
        </div>
        <div class="swiper-pagination"></div>
      </div>
  </div>

  <?php require('inc/footer.php'); ?> <!-- footer link -->

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 40,
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        }
    });
  </script>

</body>
</html>