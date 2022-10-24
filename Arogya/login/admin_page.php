<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Hi, <span>admin</span></h3>
            <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p> This is an admin page of the <br> AROGYA HEALTHCARE</p>
            <a href="login_form.php" class="btn"><b>LOGIN </b></a>
            <a href="register_form.php" class="btn"><b>REGISTER </b></a>
            <!--<a href="logout_form.php" class="btn"><b>LOG OUT </b> </a> -->
        </div>
    </div>


    
</body>
</html>


