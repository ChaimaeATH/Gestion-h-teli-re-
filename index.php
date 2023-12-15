<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUZE - Accueil</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> <!-- swiper from swiperjs.com cdn -->
    <style>
          .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
          }

          @media screen and (max-width: 575px) {
            .availability-form{
            margin-top: 0px;
            padding: 0 35px;
          }
          }
    </style>
</head>
<body class="bg-light">

<!-- header link -->
<?php require('inc/header.php'); ?>
<!-- header link -->

<!-- Carousel -->
<!-- swiper -->
<div class="container-fuild px-lg-3 mt-3">
  <div class="swiper swiper-container">
        <div class="swiper-wrapper">
          <?php 
            $res = selectAll('carousel');
            while($row = mysqli_fetch_array($res))
            {
              $path = CAROUSEL_IMG_PATH;
              echo <<<data
                  <div class="swiper-slide">
                    <img src="$path$row[image]" calss="w-100 d-block">
                  </div>
              data;
            }
          ?>
        </div>
        <div class="swiper-pagination"></div>
  </div>
</div>
<!-- swiper -->

<!-- Voir les disponibilités form -->
<?php
if(isset($_POST["reserve"])){
  $_SESSION['arrival']=$_POST['arrival'];
  $_SESSION['departure']=$_POST['departure'];
  $_SESSION['adults']=$_POST['adults'];
  $_SESSION['children']=$_POST['children'];
  redirect('rooms.php');

}
?>
<div class="container availability-form">
  <div class="row">
    <div class="col-lg-12 bg-white shadow p-4 rounded">
      <h5 class="mb-4">Vérifier La Disponibilité</h5>
      <form method="POST">
        <div class="row align-items-end">
          <div class="col-lg-3 mb-3">
            <label class="form-label" style="font-weight: 500;">ARRIVÉE</label>
            <input type="date" class="form-control shadow-none" name="arrival" required>
          </div>
          <div class="col-lg-3 mb-3">
            <label class="form-label" style="font-weight: 500;">DÉPART</label>
            <input type="date" class="form-control shadow-none" name="departure" required>
          </div>
          <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Adultes</label>
              <select class="form-select shadow-none" name="adults" required>
                <option value="1">1 Adulte</option>
                <option value="2">2 Adultes</option>
                <option value="3">3 Adultes</option>
                <option value="4">4 Adultes</option>
                <option value="5">5 Adultes</option>
              </select>
          </div>
          <div class="col-lg-2 mb-3">
            <label class="form-label" style="font-weight: 500;" >Enfants</label>
            <select class="form-select shadow-none" name="children" required>
                <option value="0">0 Enfant</option>
                <option value="1">1 Enfant</option>
                <option value="2">2 Enfants</option>
                <option value="3">3 Enfants</option>
                <option value="4">4 Enfants</option>
                <option value="5">5 Enfants</option>
              </select>
          </div>
          <div class="col-lg-1 mb-lg-3 mt-2">
            <button type="submit" class="btn text-white shadow-none custom-bg" name="reserve">Réserver</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Voir les disponibilités form -->

<!-- Nos chambres -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">NOS CHAMBRES</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 my-3">  
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
        <img src="images/rooms/1.png" class="card-img-top">
        <div class="card-body">
          <h5>Chambre Classique</h5>
          <h6 class="mb-4">dès 620MAD</h6>
          <div class="features mb-4">
            <h6 class="mb-1">Dans votre salle</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 Canapé-lit
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 Grand lit double
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Baignoire ou douche
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Vue sur Ville
              </span>
          </div>
          <div class="facilities mb-4">
            <h6 class="mb-1">Équipements</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Bureau
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Télévision à écran plat
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Minibar
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Air conditionné
                </span>
          </div>
          <div class="guests mb-4">
            <h6 class="mb-1">Invités</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                  5 Adultes
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  4 Enfants
                </span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-1">Notes</h6>
            <span class="badge rounded-pill bg-light">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </span>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Réserver</a>
            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">DÉCOUVRIR PLUS</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
        <img src="images/rooms/2.png" class="card-img-top">
        <div class="card-body">
          <h5>Chambre Exécutive</h5>
          <h6 class="mb-4">dès 700MAD</h6>
          <div class="features mb-4">
            <h6 class="mb-1">Dans votre salle</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 Canapé-lit
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 Grand lit double
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Baignoire et douche
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Vue sur Mer
              </span>
          </div>
          <div class="facilities mb-4">
            <h6 class="mb-1">Équipements</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Bureau
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Télévision à écran plat
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Minibar
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Air conditionné
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Téléphone
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Chauffage
                </span>
          </div>
          <div class="guests mb-4">
            <h6 class="mb-1">Invités</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                  5 Adultes
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  4 Enfants
                </span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-1">Notes</h6>
            <span class="badge rounded-pill bg-light">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-half text-warning"></i>
            </span>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Réserver</a>
            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">DÉCOUVRIR PLUS</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
        <img src="images/rooms/3.png" class="card-img-top">
        <div class="card-body">
          <h5>Suite</h5>
          <h6 class="mb-4">dès 1295MAD</h6>
          <div class="features mb-4">
            <h6 class="mb-1">Dans votre salle</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Grand salon
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Bureau
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                2 Canapé-lit
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                1 King size lit
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Baignoire et douche
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Vue sur Mer
              </span>
          </div>
          <div class="facilities mb-4">
            <h6 class="mb-1">Équipements</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Bureau
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Télévision à écran plat
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Minibar
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Air conditionné
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Téléphone
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Chauffage
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  High Speed Internet
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  Zone pour s’assoir
                </span>
          </div>
          <div class="guests mb-4">
            <h6 class="mb-1">Invités</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                  5 Adultes
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                  4 Enfants
                </span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-1">Notes</h6>
            <span class="badge rounded-pill bg-light">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </span>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Réserver</a>
            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">DÉCOUVRIR PLUS</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12 text-center mt-5">
          <a href="rooms.php" target="_blank" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Plus De Chambres ></a>
    </div>
  </div>
</div>

<!-- Nos chambres -->

<!-- Équipements -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Les chambres et suites disposent toutes de:</h2>

<div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/1.png" width="80px">
          <h5 class="mt-3">Wi-Fi</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/2.png" width="80px">
          <h5 class="mt-3">Vue Mer</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/3.png" width="80px">
          <h5 class="mt-3">Climatisation</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/4.png" width="80px">
          <h5 class="mt-3">Téléphone</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/5.png" width="80px">
          <h5 class="mt-3">Salle de bain privée avec douche</h5>
    </div>
  </div>

  <div class="row  justify-content-evenly px-lg-0 px-md-0 px-5">
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/6.png" width="80px">
          <h5 class="mt-3">Vue Piscine</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/7.png" width="80px">
          <h5 class="mt-3">Sèche-cheveux</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/8.png" width="80px">
          <h5 class="mt-3">Réfrigérateur</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/9.png" width="80px">
          <h5 class="mt-3">Coffre-fort</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/10.png" width="80px">
          <h5 class="mt-3">Ecran TV LCD</h5>
    </div>
  </div>
  <div class="col-lg-12 text-center mt-5">
    <a href="facilities.php" target="_blank" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Plus D'équipements ></a>
  </div>
</div>

<!-- Équipements -->

<!-- Commentaires clients -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Commentaires Clients</h2>

<div class="container mt-5">
<div class="swiper swiper-testimonials">
      <div class="swiper-wrapper mb-5">
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/features/star.png" width="30px">
            <h6 class="m-0 ms-2">User1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Maiores illo quis, provident nobis nesciunt assumenda nemo 
            consequatur quidem temporibus doloribus.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/features/star.png" width="30px">
            <h6 class="m-0 ms-2">User1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Maiores illo quis, provident nobis nesciunt assumenda nemo 
            consequatur quidem temporibus doloribus.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/features/star.png" width="30px">
            <h6 class="m-0 ms-2">User1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Maiores illo quis, provident nobis nesciunt assumenda nemo 
            consequatur quidem temporibus doloribus.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="col-lg-12 text-center mt-5">
    <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Savoir Plus ></a>
  </div>
</div>

<!-- Commentaires clients -->

<!-- Location -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contact & Localisation</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
    <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="bg-white p-4 rounded mb-4">
        <h5>Contactez-nous</h5>
        <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
          <i class="bi bi-telephone-fill"></i>  +<?php echo $contact_r['pn1'] ?>
        </a>
        <br>
        <?php 
          if($contact_r['pn2']!=''){
            echo<<<data
              <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                <i class="bi bi-telephone-fill"></i>  +$contact_r[pn2]
              </a>
            data;
          }
        ?>

      </div>
      <div class="bg-white p-4 rounded mb-4">
        <h5>Suivez nous</h5>
        <?php 
          if($contact_r['tw']!=''){
            echo<<<data
              <a href="$contact_r[tw]" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-twitter me-1"></i> Twitter
                </span>
              </a>
              <br>      
            data;      
          }
        ?>

        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-facebook me-1"></i> Facebook
          </span>
        </a>
        <br>
        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-instagram me-1"></i> Instagram
          </span>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Location -->

<!-- footer link -->
<?php require('inc/footer.php'); ?>
<!-- footer link -->



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });

      var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
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