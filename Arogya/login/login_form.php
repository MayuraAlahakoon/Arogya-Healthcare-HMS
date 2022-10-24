<?php

@include 'config.php';

session_start();
//if condition used for check whether details submitted ?
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];


//Select query for login form 
   $select = " SELECT * FROM login WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);
//if condition for whether results are greter than 0 and if it is true below statements will be execute.
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin') {

        $_SESSION['admin_name'] = $row['name'];
        header('location:/Arogya/Dashboard/index.php');

      }elseif($row['user_type'] == 'user'){
        

        $_SESSION['user_name'] = $row['name'];
        header('location:/Arogya/Dashboard/index.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
      
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="login_form.php" method="post">
            <h3>Login Now</h3>
            <?php
            if(isset($error))
            {
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password" required>
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Don't have an account? <a href="register_form.php">REGISTER NOW</a></p>
        </form>
    </div>
</body>
</html>
