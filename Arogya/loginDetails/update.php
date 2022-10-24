<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}
// Create MySQL database connection to web system
include "dbconn.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
//SQL Update query
    $sqlUpdate = "UPDATE `login` SET `name`='$user_name',`email`='$user_email',
    `password`='$password',`user_type`='$user_type' WHERE  `id`='$id';";

    $resultUpdate = $conn->query($sqlUpdate);

    if($resultUpdte == TRUE){
        echo "Record Updated Successfully";
    }
    else{
        echo "Error:" . $sqlUpdate . "<br>" . $conn->error;
    }
    header('location:/Arogya/loginDetails/loginView.php');


}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `login` WHERE `id`='$id' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $user_name = $row['name'];
            $user_email = $row['email'];
            $password = $row['password'];
            $user_type = $row['user_type'];
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="">

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
                <li><a href="/Arogya/Dashboard/index.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li><a href="/Arogya/patientInfo/testpatient.php"><span class="las la-procedures"></span>
                    <span>Patient Details</span></a>
                </li>

                <li><a href="/Arogya/patientReport/report.php"><span class="las la-notes-medical"></span>
                    <span>Patient Report</span></a>
                </li>
                <li><a href="/Arogya/roomDetails/roomDetails.php"><span class="lar la-hospital"></span>
                    <span>Room Details</span></a>
                </li>
                <li><a href="/Arogya/staffDetails/staffDetails.php"><span class="las la-users"></span>
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

                    PAYMENT INFORMATION
                </h2>

                <div class="user-wrapper">
                    <img src="/Arogya/img/360_F_227450952_KQCMShHPOPeb.jpg" width="80px" height="80px" alt="">
                    <div class="user-button">
                        <small>ADMIN</small>
                        <h4><?php echo $_SESSION['admin_name']?></h4>
                        
                        <button> <a href="/Arogya/login/logout.php" target="_self" >LOGOUT</a><span class="las la-arrow-right"></span></button>
                     
                        
                    </div>
                </div>
        </header>

        <main>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>LOGIN DETIALS</h2>
                            <button  type="button"> <a href="/Arogya/loginDetails/loginView.php" 
                            target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>
                        </div> 
                        <br>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="/Arogya/loginDetails/update.php" method="post">
                                        <br>                       
                                        <input type="hidden" name="id"  value="<?php echo $id;?>">
                                        
                                        <h5>User Name:</h5>
                                        <br>
                                        <input type="text" name="name" value="<?php echo $user_name;?>">
                                        
                                        <h5>User Email:</h5>
                                        <br>
                                        <input type="text" name="email" value="<?php echo $user_email;?>"> 
                                        
                                        <h5>Password:</h5>
                                        <br>
                                        <input type="text" name="password" value="<?php echo $password;?>"> 
                                    
                                        <h5>User Type:</h5>
                                        <select name="user_type" value="<?php echo $user_type;?>">
                                            <option value="user">USER</option>
                                            <option value="admin"> ADMIN </option>
                                        </select>
                                        <br>
                                        <input type="submit" name="update" value="UPDATE" class="form-btn">
                                </form>    
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php
    } else{
        header('location:/Arogya/loginDetails/loginCredentials.php');
    }
}
?>




