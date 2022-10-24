
<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

if(isset($_POST['submit'])){
    $ID = $_POST['roomID'];
    $name = $_POST['roomName'];

    $sqlSelect = "SELECT * FROM roomDetails WHERE roomID = '$ID' && roomName = '$name'";
    $result = mysqli_query($conn, $sqlSelect);


   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{


        $sql = " INSERT INTO  roomDetails (roomID, roomName) VALUES ('$ID','$name');";
        mysqli_query($conn, $sql);

        header('location:/Arogya/roomDetails/roomDetails.php');
      
        
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
    <title>Room Details</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/Arogya/roomDetails/roomStyle.css">
    <script src="/Arogya/js/sweetalert.js"></script>
    <script>
        swal("Good job!", "You clicked the button!", "success");

    </script>

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
                <li><a href="/Arogya/patientInfo/testpatient.php" ><span class="las la-procedures"></span>
                    <span>Patient Details</span></a>
                </li>


                <li><a href="/Arogya/patientReport/report.php"><span class="las la-notes-medical"></span>
                    <span>Patient Report</span></a>
                </li>

                <li><a href="/Arogya/roomDetails/roomDetails.php" class="active"><span class="lar la-hospital"></span>
                    <span>Room Details</span></a>
                </li>
                <li><a href="/Arogya/staffDetails/staffDetails.php"><span class="las la-users"></span>
                    <span>Staff Details</span></a>
                </li>
                <li><a href="/Arogya/payment/paymentTest.php"><span class="las la-dollar-sign"></span>
                    <span>Payment Details</span></a>
                </li>
                <li><a href="/Arogya/loginDetails/loginCredentials.php"><span class="las la-users-cog"></span>
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

                    ROOM DETAILS
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
            <div class="form-container">
                <form action="" method="post">

            <?php
            if(isset($error))
            {
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>

                    <h3>ROOM INFO</h3>


                
                    <br> <br>

                    <input type="text" name="roomID" required placeholder="Enter Room ID ">
        
                    <input type="text" name="roomName" required placeholder="Enter Room Name">
        
                    <input type="submit" name="submit" value="ADD" class="form-btn">

                </form>

            </div>

            <div class="form-container">
                <form action="/Arogya/roomDetails/roomScheDB.php" method="post">
                <?php
                if(isset($error))
                {
                    foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
                };
                ?>

                    <h3>ROOM SCHEDULING</h3>



                    <br> <br>
                    <input type="text" name="scheduledDate" required placeholder="Enter Room Scheduled Date ">
                    <input type="text" name="startTime" required placeholder="Enter Start Time">
                    <input type="text" name="endTime" required placeholder="Enter End Time">
                    <input type="text" name="doctorName" required placeholder="Enter Doctor's Name">
                    <input type="text" name="nurseName" required placeholder="Enter Nurse's Name">
                    
                    <input type="text" name="roomScheID" required placeholder="Enter Room ID ">
                    <input type="submit" name="submit" value="SCHEDULE" class="form-btn">

                </form>
                <form action='/Arogya/roomDetails/view.php' method='get'>
                    <input type="submit" name="submit" value="EDIT" class="form-btn"><br>


                </form>

            </div>

        </div>

    </main>
        
                
    
    
</body>
</html>



