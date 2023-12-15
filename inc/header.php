<?php 
  session_start();

  require('admin/inc/db_config.php');
  require('admin/inc/essentials.php');

  $contact_q = "SELECT * FROM `contact_details` WHERE `ad_id`=?";
  $values = [1];
  $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
?>



<!-- Login and register -->
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
  <img src="images/carousel/8.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
    <a class="navbar-brand me-5 fw-bold fs-3 h-front" href="index.php">Amuze</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-2" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="rooms.php">Chambre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="facilities.php">Équipements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="contact.php">Contactez-nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">À propos</a>
        </li>
      </ul>
      
      <!-- login button-->

      <?php 
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <div class='user'>
          $_SESSION[username]  - <a href='logout.php' class='btn text-white shadow-none custom-bg'> LOGOUT</a>
        </div>
        ";
      }
      else
      {
        echo"
        <div class='d-flex' >
        <form>
          <a type='button' href='user_login.php' class='btn btn-outline-dark shadow-none me-lg-2 me-2'> 
              <span id='cnx'>Se connecter </span> 
          </a>
          <a type='button'  href='user_signin.php' class='btn btn-outline-dark shadow-none'> 
              Créer un nouveau compte
          </a>
        </form>
      </div>
        ";
      }

      ?>


      <!-- login button-->
    </div>
  </div>
</nav>





<!-- Register modal -->
<!-- Login and register -->