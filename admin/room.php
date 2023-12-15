<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur Panel - Chambres</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>
    

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">NOS CHAMBRES</h3>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                    <th scope="col">Numéro de chambre</th>
                                    <th scope="col">Type chambre</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                    <?php
                                    
                                    $q = "SELECT * FROM room ";
                                    
                                    $data = mysqli_query($con,$q);
                                    $i=1;

                                    while($row = mysqli_fetch_assoc($data))
                                        {
                                            echo<<<query
                                                <tr>
                                                    <td>$row[id_room]</td>
                                                    <td>$row[id_type_rooms]</td>
                                                </tr>
                                            query;
                                            $i++;
                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>      
                
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>



</body>
</html>
