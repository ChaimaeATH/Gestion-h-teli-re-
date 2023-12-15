<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUZE - Chambres</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

  <?php require('inc/header.php'); ?> <!-- header link -->

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Nos Chambres</h2>
    <div class="h-line bg-dark"></div> <!-- doesnt work -->
  </div>

  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
        <form method="post">
            <div class="container-fluid flex-lg-column align-items-stretch">
              <h4 class="mt-2">FILTRER</h4>
              <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">Voir les disponibilités</h5>
                  <label class="form-label">ARRIVÉE</label>
                  <input type="date" class="form-control shadow-none mb-3" name="arrival" required value=<?php if(isset($_SESSION['arrival'])) echo $_SESSION['arrival']; ?>  >
                  <label class="form-label">DÉPART</label>
                  <input type="date" class="form-control shadow-none" name="departure" required value=<?php if(isset($_SESSION['departure'])) echo $_SESSION['departure']; ?> >
                </div>

                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">Invités</h5>
                  <div class="d-flex">
                    <div class="me-3">
                      <label class="form-label">Adultes</label>
                      <select class="form-select shadow-none" name="adults">
                        <option value="1" <?php if(isset($_SESSION['adults']) and $_SESSION['adults']==1 ) echo "selected";  ?>>1 Adulte</option>
                        <option value="2" <?php if(isset($_SESSION['adults']) and $_SESSION['adults']==2 ) echo "selected"; ?>>2 Adultes</option>
                        <option value="3" <?php if(isset($_SESSION['adults']) and $_SESSION['adults']==3 ) echo "selected"; ?>>3 Adultes</option>
                        <option value="4" <?php if(isset($_SESSION['adults']) and $_SESSION['adults']==4 ) echo "selected"; ?>>4 Adultes</option>
                        <option value="5" <?php if(isset($_SESSION['adults']) and $_SESSION['adults']==5 ) echo "selected"; ?>>5 Adultes</option>
                      </select>
                    </div>
                    <div>
                      <label class="form-label">Enfants</label>
                      <select class="form-select shadow-none" name="children">
                      <option value="0"  <?php if(isset($_SESSION['children']) and $_SESSION['children']==0 ) echo "selected";  ?>>0 Enfant</option>
                      <option value="1"  <?php if(isset($_SESSION['children']) and $_SESSION['children']==1 ) echo "selected";  ?>>1 Enfant</option>
                      <option value="2"  <?php if(isset($_SESSION['children']) and $_SESSION['children']==2 ) echo "selected";  ?>>2 Enfants</option>
                      <option value="3"  <?php if(isset($_SESSION['children']) and $_SESSION['children']==3 ) echo "selected";  ?>>3 Enfants</option>
                      <option value="4"  <?php if(isset($_SESSION['children']) and $_SESSION['children']==4 ) echo "selected";  ?>>4 Enfants</option>
                      <option value="5"  <?php if(isset($_SESSION['children']) and $_SESSION['children']==5 ) echo "selected";  ?> >5 Enfants</option>
                    </select>
                    </div>
                  </div>
                </div>
                <input class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" name='recherche' value='Rechercher' type='submit'/>
                
              </div>
            </div>
            </form> 
        </nav>
       
      </div>
      <div class="col-lg-9 col-md-12 px-4">
<?php

if(isset($_POST['recherche'])){
  $req="select * from room left join concern on room.id_room=concern.id_room 
  left join reservation on concern.id_res=reservation.id_res 
  left join rooms on room.id_type_rooms=rooms.id 
  left join room_facilities on room_facilities.room_id_type=rooms.id
  left join facilities on  facilities.id = room_facilities.facilities_id
  left join room_features on room_features.room_id_type= rooms.id 
  left join  features on features.id = room_features.features_id 
  where concern.id_res is null 
  or reservation.arrival>='$_POST[departure]'
  or reservation.departure<='$_POST[arrival]'";
  $result=mysqli_query($con,$req) or die("sqdqs");
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){

      ?>


<div class="card mb-4 border-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img <?php if($row[1]==1) echo 'src="images/rooms/1.png"'; else if($row[1]==2) echo 'src="images/rooms/2.png"'; else echo 'src="images/rooms/3.png"'; ?> class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3"><?php echo $row[11] ?></h5>
              <div class="features mb-3">
                  <h6 class="mb-1">Dans votre salle </h6>
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
              <div class="facilities mb-3">
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
              <div class="guests">
                <h6 class="mb-1">Invités</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                  <?php echo $row[7] ?> Adultes
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                  <?php echo $row[8] ?> Enfants
                  </span>
              </div>
            </div>
            <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
              <h6 class="mb-4"><?php echo $row[13] ?> MAD</h6>
              
              <a href="reservation.php?id=<?php echo $row[0]?>&arrival=<?php echo $_POST['arrival']?>&departure=<?php echo $_POST['departure']?>&adults=<?php echo $_POST['adults']?>&children=<?php echo $_POST['children']?>" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" onclick="return confirm('<?php echo $_SESSION['username']; ?>')">Réserver</a>
              <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">DÉCOUVRIR PLUS</a>
            </div>
          </div>
        </div>
        

 <?php     
    }
  }
 
}else{
  $req="select * from room left join concern on room.id_room=concern.id_room 
  left join reservation on concern.id_res=reservation.id_res 
  left join rooms on room.id_type_rooms=rooms.id 
  left join room_facilities on room_facilities.room_id_type=rooms.id
  left join facilities on  facilities.id = room_facilities.facilities_id
  left join room_features on room_features.room_id_type= rooms.id 
  left join  features on features.id = room_features.features_id ";
  $result=mysqli_query($con,$req) or die("sssuuuuu");
  while($row=mysqli_fetch_array($result)){

    ?>

<div class="card mb-4 border-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img <?php if($row[1]==1) echo 'src="images/rooms/1.png"'; else if($row[1]==2) echo 'src="images/rooms/2.png"'; else echo 'src="images/rooms/3.png"'; ?> class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3"><?php echo $row[11] ?></h5>
              <div class="features mb-3">
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
              <div class="facilities mb-3">
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
              <div class="guests">
                <h6 class="mb-1">Invités</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                  <?php echo $row[7] ?> Adultes
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                  <?php echo $row[8] ?> Enfants
                  </span>
              </div>
            </div>
            <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
              <h6 class="mb-4"><?php echo $row[13] ?> MAD </h6>
              
              <a href="reservation.php?id=<?php echo $row[0]?>&arrival=<?php echo $_POST['arrival']?>&departure=<?php echo $_POST['departure']?>&adults=<?php echo $_POST['adults']?>&children=<?php echo $_POST['children']?>" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" onclick="return confirm('<?php echo $_SESSION['username']; ?>')">Réserver</a>
              <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">DÉCOUVRIR PLUS</a>
            </div>
          </div>
        </div>
        

<?php
  }
}

?>


    
      
      </div>

    </div>
  </div>

  <?php require('inc/footer.php'); ?> <!-- footer link -->

</body>
</html>