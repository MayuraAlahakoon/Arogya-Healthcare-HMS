<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $scheDate = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $doctorName = $_POST['docName'];
    $nurseName = $_POST['nurseName'];
    $roomID = $_POST['roomID'];



    $sql = "UPDATE `roomSchedule` SET `scheduleDate`='$scheDate',`startTime`='$startTime',`endTime`='$endTime',`doctorName`='$doctorName',`nurseName`='$nurseName' WHERE `id`='$id'";

    $result = $conn->query($sql);

    if($result == TRUE){
        header('location:/Arogya/roomDetails/view.php');
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    


}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `roomSchedule` WHERE `id`='$id' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $scheDate = $row['scheduleDate'];
            $startTime = $row['startTime'];
            $endTime = $row['endTime'];
            $doctorName = $row['doctorName'];
            $nurseName = $row['nurseName'];
            $roomID = $row['roomID'];
        }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room & Schedulling Information</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="/Arogya/payment/payView.css">
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
                <li><a href="/Arogya/roomDetails/roomDetails.php"class="active"><span class="lar la-hospital"></span>
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

                    ROOM SCHEDULE INFORMATION
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
                
                            <button  type="button"> <a href="/Arogya/roomDetails/view.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <br>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                <br>                       
                                    <input type="hidden" name="id"  value="<?php echo $id;?>">
                                    
                        
                                    
                                    <h5>Enter Schedule Date:</h5><br>
                                    <input type="text" name="date"  value="<?php echo $scheDate;?>"> 
                                    
                                    <h5>Enter Start Time:</h5><br>
                                    <input type="text" name="startTime"  value="<?php echo $startTime;?>"> 
                                    
                                    <h5>Enter End Time:</h5><br>
                                    <input type="text" name="endTime" value="<?php echo $endTime;?>"> 
                                    
                                    <h5>Enter Doctor Name:</h5><br>
                                    <input type="text" name="docName" value="<?php echo $doctorName;?>"> 
                                    
                                    <h5>Enter Nurse Name:</h5><br>
                                    <input type="text" name="nurseName" value="<?php echo $nurseName;?>">
                                    
                                    <h5>Enter Room ID :</h5><br>
                                    <input type="text" name="roomID" required placeholder="Total Amount "value="<?php echo $roomID;?>">
                                    
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
        header('location:/Arogya/payment/paymentView.php');
    
    }
    
    

}

?>




