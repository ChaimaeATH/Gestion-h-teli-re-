<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if(isset($_GET['seen']))
    {
        $frm_data = filteration($_GET);

        if($frm_data['seen']=='all'){
            $q = "UPDATE `user_queries` SET `seen`=?";
            $values = [1];
            if(update($q,$values,'i')){
                alert('success','Tout marqué comme lu!');
            }
            else{
                alert('error','Opération échoué!');
            }
        }
        else{
            $q = "UPDATE `user_queries` SET `seen`=? WHERE `ad_id`=?";
            $values = [1,$frm_data['seen']];
            if(update($q,$values,'ii')){
                alert('success','Marqué comme lu!');
            }
            else{
                alert('error','Opération échoué!');
            }
        }
    }

    if(isset($_GET['del']))
    {
        $frm_data = filteration($_GET);

        if($frm_data['del']=='all'){
            $q = "DELETE FROM `user_queries`";
            if(mysqli_query($con,$q)){
                alert('success','Toutes les données supprimées!');
            }
            else{
                alert('error','Opération échoué');
            }
        }
        else{
            $q = "DELETE FROM `user_queries` WHERE `ad_id`=?";
            $values = [$frm_data['del']];
            if(delete($q,$values,'i')){
                alert('success','Données supprimées!');
            }
            else{
                alert('error','Opération échoué');
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur Panel - Requêtes Des Utilisateurs</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">REQUÊTES DES UTILISATEURS</h3>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm"><i class="bi bi-check-all"></i> Marquer tout comme lu</a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm"><i class="bi bi-trash-fill"></i> Supprimer tout</a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom Complet</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" width="20%">Sujet</th>
                                    <th scope="col" width="30%">Commentaires</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = "SELECT * FROM `user_queries` ORDER BY `ad_id` DESC";
                                        $data = mysqli_query($con,$q);
                                        $i=1;

                                        while($row = mysqli_fetch_assoc($data))
                                        {
                                            $seen='';
                                            if($row['seen']!=1){
                                                $seen = "<a href='?seen=$row[ad_id]' class='btn btn-sm rounded-pill btn-primary'>Marquer comme lu</a> <br>";
                                            }
                                            $seen.="<a href='?del=$row[ad_id]' class='btn btn-sm rounded-pill btn-danger mt-2'>Supprimer </a>";

                                            echo<<<query
                                                <tr>
                                                    <td>$i</td>
                                                    <td>$row[name]</td>
                                                    <td>$row[email]</td>
                                                    <td>$row[subject]</td>
                                                    <td>$row[message]</td>
                                                    <td>$row[date]</td>
                                                    <td>$seen</td>
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
