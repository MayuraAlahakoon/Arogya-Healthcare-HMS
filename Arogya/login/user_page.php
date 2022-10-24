<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
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
            <h3>Hi, <span>user</span></h3>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p> This is user page of the <br> AROGYA HEALTHCARE</p>
            <a href="login_form.php" class="btn"><b>LOGIN </b></a>
            <a href="register_form.php" class="btn"><b>REGISTER </b></a>
        </div>
    </div>


    
</body>
</html>