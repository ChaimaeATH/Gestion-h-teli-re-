<?php 
    require('inc/essentials.php');
    require('inc/db_config.php'); // all the page is new
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur Panel - Les Utilisateurs</title> 
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content"> 
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">LES UTILISATEURS</h3>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th scope="col">Nom Complet</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">address</th>
                                    <th scope="col">zip</th>
                                    <th scope="col">date de naissance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = "SELECT * FROM `registered_users`";
                                        $data = mysqli_query($con,$q);

                                        while($row = mysqli_fetch_assoc($data))
                                        {
                                            echo<<<query
                                                <tr>
                                                    <td>$row[username]</td>
                                                    <td>$row[email]</td>
                                                    <td>$row[address]</td>
                                                    <td>$row[zip]</td>
                                                    <td>$row[birth_date]</td>
                                                </tr>
                                            query;
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
