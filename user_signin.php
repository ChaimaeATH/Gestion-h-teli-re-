
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMUZE - login</title>
    <link rel="stylesheet" href="style.css">
    <?php require('inc/links.php'); 
    ?>
</head>

<body>

  <?php 
  require('inc/header.php'); 
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception; 

  function sendMail($email,$v_code)
  {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'oussamazzouzi1@gmail.com';             //SMTP username
      $mail->Password   = 'oussamazzouzi123';                     //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      $mail->setFrom('oussamazzouzi1@gmail.com', 'Amuze');
      $mail->addAddress($email);     
  
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Email verification from Amuze Hotel';
      $mail->Body    = "Thanks for registration!
      click the link below to verify the email address
      <a href='http://localhost/emailverify/verify.php?email=$email&v_code=$v_code'>Verify Now</a>";
  
      $mail->send();  
      return true;
    } 
    catch (Exception $e){
      return false;
    }
  }
  
  ?> 
  <div class="popupcontainer">
    <div class="register popup">
      <form method="POST" action="">
      <h2>
        <span>User Register</span>
        <button type="reset" onClick="location.href='index.php'">X</button>
      </h2>
      <input type="text" placeholder="Votre Nom Complet" name="fullname">
      <input type="text" placeholder="Username" name="username">
      <input type="email" placeholder="E-mail" name="email">
      <input type="number" placeholder="Votre Numéro de Téléphone" name="pn">
      <input type="file" placeholder="Photo" name="picture">
      <input type="text" placeholder="Adresse" name="address">
      <input type="number" placeholder="Votre Code Zip" name="zip">
      <input type="date" placeholder="Date de naissance" name="birth_date">
      <input type="password" placeholder="Password" name="password">
      <button type="submit" class="registerbtn" name="register">Register</button>
      </form>
    </div>
  </div>

  <?php

  

if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query);
   

        if(mysqli_num_rows($result)==0) #it will be executed if no one has taken username or email before
        {
          /* added recently */ $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                               $v_code=bin2hex(random_bytes(16));

            $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `pn`, `picture`, `address`, `zip`, `birth_date`, `password`, `verification_code`, `is_verified`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$_POST[pn]','$_POST[picture]','$_POST[address]','$_POST[zip]','$_POST[birth_date]','$password','$v_code','0')";

            if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
            {
              $_SESSION['fullname']=$_POST['fullname'];
              $_SESSION['username']=$_POST['username'];
              $_SESSION['email']=$_POST['email'];
              $_SESSION['address']=$_POST['address'];
                #if data inserted successfully
                echo"
                    <script>
                        alert('Registred Succesful');
                        window.location.href='index.php';
                    </script>
                ";
            }
            else
            {
                #if data cannot be inserted
                // Server Down instead of created successfuly
                echo"
                    <script>
                        alert('Registred Succesful'); 
                        window.location.href='user_login.php';
                    </script>
                ";
            }
        }else{
          $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username'])
            {
                #error for username already registered
                echo"
                <script>
                  alert('$result_fetch[username] - Username already taken');
                  window.location.href='user_login.php';
                </script>
                ";  
              
            }
            else
            {
                #error for email already registred
                echo"
                    <script>
                        alert('$result_fetch[email] - E-mail already registered');
                        window.location.href='index.php';
                    </script>
                ";  
            }
        }
}
?>

</body>
</html>