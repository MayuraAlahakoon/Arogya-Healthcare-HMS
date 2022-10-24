
<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

?>
<?php
$servername = 'localhost';
$username = 'mayura';
$password = '@ndr0@z5';
$dbname = 'arogya_dbbase';


$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn -> connect_error) {
    die("Connecion failed:" . $conn->connect_error);
}

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM login WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO login(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
        
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Information</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/Arogya/loginDetails/loginStyle.css">
</head>
<body>
    
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
           <h2> <span class="las la-stethoscope"></span> <span>AROGYA HEALTHCARE</span></h2> 
        </div>

        <div class="sidebar-menu">
            <ul>
                <li><a href="/Arogya/Dashboard/index.php" ><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li><a href="/Arogya/patientInfo/patient-details.php" ><span class="las la-procedures"></span>
                    <span>Patient Details</span></a>
                </li>

                <li><a href="/Arogya/patientReport/report.php"><span class="las la-notes-medical"></span>
                    <span>Patient Report</span></a>
                </li>

                <li><a href="/Arogya/roomDetails/roomDetails.php"><span class="lar la-hospital"></span>
                    <span>Room Details</span></a>
                </li>
                <li><a href="/Arogya/staffDetails/staffDetails.php"><span class="las la-users" ></span>
                    <span>Staff Details</span></a>
                </li>
                <li><a href="/Arogya/payment/paymentTest.php"><span class="las la-dollar-sign"></span>
                    <span>Payment Details</span></a>
                </li>

                <li><a href="/Arogya/loginDetails/loginCredentials.php"class="active"><span class="las la-users-cog"></span>
                    <span>Login Details</span></a>
                </li>


            </ul>
        </div>  
    </div>

    <div class="main-content">
        <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>

                    LOGIN INFORMATION
                </h2>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search here" />
                </div>
                <div class="user-wrapper">
                    <img src="/Arogya/img/360_F_227450952_KQCMShHPOPeb.jpg" width="80px" height="80px" alt="">
                    <div class="user-button">
                        <small>user</small>
                        <h4><?php echo $_SESSION['admin_name']?></h4>
                        
                        <button> <a href="/Arogya/login/logout.php" target="_self" >LOGOUT</a><span class="las la-arrow-right"></span></button>
                     
                        
                    </div>
                </div>
        </header>

        
    <main>
        <div class="cards">
        <div class="card-header">
        </div>
            <div class="form-container">


                <h3> LOGIN DETAILS </h3>
                <br> <br>
                <form action="loginCredentials.php" method="post"> 

                   
                    <?php
                    if(isset($error))
                    {
                        foreach($error as $error){
                            echo '<span class="error-msg">' .$error. '</span>';
                        };
                    };
                    ?>

                    <input type="text" name="name" required placeholder="Enter your name"> <br>
                    <input type="email" name="email" required placeholder="Enter your email"> <br>
                    <input type="password" name="password" required placeholder="Enter your password" required> <br>
                    <input type="password" name="cpassword" required placeholder="Confirm your password"><br>
                    <select name="user_type">
                        <option value="user">USER</option>
                        <option value="admin"> ADMIN </option>
                    </select><br>
                    <input type="submit" name="submit" value="register now" class="form-btn"><br>
                </form>
                <form action='/Arogya/loginDetails/loginView.php' method='get'>
                    <input type="submit" name="submit" value="EDIT" class="form-btn"><br>


                </form>


            </div>
            
              


           


           
      

    </main>
        
                
    
    
</body>
</html>



