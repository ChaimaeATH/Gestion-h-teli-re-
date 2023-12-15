<?php
    require('admin/inc/db_config.php');

    if(isset($_GET['email']) && isset($_GET['v_code']))
    {
        $query="SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
        $result=mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $result_fetch=mysqli_fetch_assoc($result);
                
            }
        }
        else{
            echo"
                <script>
                    alert('Cannot run query');
                    window.location.href='index.php';
                </script>
            ";
        }
    }
?>