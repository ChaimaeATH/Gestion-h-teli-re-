<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUZE - login</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/links.php'); ?>
</head>

<body>

  <?php 
  require('inc/header.php'); ?> 
  <div class="popupcontainer">
    <div class="popup">
      <form method="POST" action="">
      <h2>
        <span>User Login</span>
        <button type="reset" onClick="location.href='index.php'">X</button>
      </h2>
      <input type="text" placeholder="E-mail or Username" name="email_username">
      <input type="password" placeholder="Password" name="password">
      <button type="submit" class="loginbtn" name="login">Login</button>
      </form>
    </div>
  </div>
<?php

if(isset($_POST['login'])){
 /* $user_exist_query="SELECT * FROM `registered_users` WHERE (`username`='$_POST[email_username]' OR `email`='$_POST[email_username]') and password='$_POST[password]'";
    $result=mysqli_query($con,$user_exist_query);
    if(mysqli_num_rows($result)==1){
      $result_fetch=mysqli_fetch_assoc($result);
      $_SESSION['email']=$result_fetch['email'];
      $_SESSION['full_name']=$result_fetch['full_name'];
      $_SESSION['username']=$result_fetch['username'];
      $_SESSION['address']=$result_fetch['address'];
*/
$_SESSION['email']=$result_fetch['email'];
    $query ="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
      if(mysqli_num_rows($result)==1)
      {
        $result_fetch=mysqli_fetch_assoc($result);
        if(password_verify($_POST['password'],$result_fetch['password']))
        {
          $_SESSION['email']=$result_fetch['email'];
          $_SESSION['full_name']=$result_fetch['full_name'];
          $_SESSION['username']=$result_fetch['username'];
          $_SESSION['address']=$result_fetch['address'];
          
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$result_fetch['username'];
          header("location: index.php");
        }
        else
        {
          echo"
          <script>
              alert('Incorrect Password!');
              window.location.href='index.php';
          </script>
          "; 
        }  
      }
      else
      {
        echo"
        <script>
            alert('Email or password not registred!');
            window.location.href='index.php';
        </script>
        ";  
      }
    }
    else{
      echo"
      <script>
        alert('Cannot run query');
        window.location.href='user_login.php';
      </script>
      "; 
    }
}




?>
</body>
</html>