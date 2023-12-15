<?php
session_start();
require('admin/inc/db_config.php');
if(!isset($_SESSION['email'])){
    header('location:user_login.php');
}else{
    $id=$_GET['id'];
    $arrival=$_GET['arrival'];
    $departure=$_GET['departure'];
    $children=$_GET['children'];
    $adults=$_GET['adults'];

    $req="insert into reservation values(0,'$arrival','$departure',$adults,$children,'$_SESSION[email]')";
    mysqli_query($con,$req) or die("ssssuuuuuu");
    $req="select id_res from reservation where arrival='$arrival' and departure='$departure' and adults='$adults' and children='$children' and email='$_SESSION[email]'";
    $result=mysqli_query($con,$req) or die("ssssuuuuuu");
    $row=mysqli_fetch_assoc($result);
    $id_rev=$row['id_res'];
    mysqli_query($con,"insert into concern values($id,$id_rev)") or die("ssssuuuuuu2");
    header('location:index.php');
}

?>