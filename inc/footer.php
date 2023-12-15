<div class="container-fluid bg-white mt-5">
  <div class="row">
  <div class="col-lg-4 p-4">
      <h3 class="h-font fw-bold fs-3 mb-2">AMUZE HOTEL</h3>
      <p>
      Marque emblématique de l’hôtellerie marocaine, Amuze Hotel représente un art de vivre,
       des valeurs et des traditions d’excellence.
       Elle est aussi le fruit d’une vision et possède des fondations solides.
      </p>
  </div>
  <div class="col-lg-4 p-4">
      <h5 class="mb-3">Liens</h5>
        <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
        <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Chambres</a> <br>
        <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Équipements</a> <br>
        <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contactez-nous</a> <br>
        <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">À propos</a>
  </div>
  <div class="col-lg-4 p-4">
      <h5 class="mb-3">Suivez nous</h5>
      <?php
        if($contact_r['tw']!=''){
          echo<<<data
            <a href="$contact_r[tw]" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-twitter me-1"></i> Twitter
            </a><br>      
          data;      
        }
      ?>
      <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
        <i class="bi bi-facebook me-1"></i> Facebook
      </a><br>
      <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none">
        <i class="bi bi-instagram me-1"></i> Instagram
      </a><br>
  </div>
  </div>
</div>
<h6 class="text-center bg-dark text-white p-3 m-0">Developed by ISGAKOCH</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
  function setActive()
  {
    let navbar = document.getElementById('nav-bar');
    let a_tags = navbar.getElementsByTagName('a');

    for(i=0; i<a_tags.length; i++)
    {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];

      if(document.location.href.indexOf(file_name) >= 0){
        a_tags[i].classList.add('active');
      }

    }
  }
  setActive();
</script>

