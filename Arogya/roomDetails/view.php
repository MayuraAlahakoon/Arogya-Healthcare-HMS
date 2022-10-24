<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";


$sql = "SELECT * FROM `roomDetails` ";
$result = $conn->query($sql);

$sqlSche = "SELECT * FROM `roomSchedule`";
$resultSche = $conn->query($sqlSche);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room / Schedulling Information</title>
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

                    ROOM/SCHEDULLING INFORMATION
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
                            <h2>ROOM DETIALS</h2>
                            <button  type="button"> <a href="/Arogya/roomDetails/roomDetails.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                       
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>ROOM ID</th>
                                                    <th>ROOM NAME</th>
                                                    <th>EDIT</th>
                                                   
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($result->num_rows>0) {
                                                            while($row = $result->fetch_assoc()){
                                                    ?>         
                                                                <tr>
                                                                <td><?php echo $row['roomID']; ?> </td>
                                                                <td><?php echo $row['roomName']; ?> </td>
                                    
                                                                <td> <a  class="lar la-edit" href="update.php?id=<?php echo $row['roomID'];?>">
                                                                </a>&nbsp;<a class="las la-trash" href="delete.php?id=<?php echo $row['roomID'];?>">
                                                                </a>

                                                                </td>
                                                                
                                                                </tr>

                                                                <?php }

                                                        } 
                                                        ?>  



                                                </tbody>

                                            </table> 
                            </div>
                            
                            <div class="card-header">
                            <h2>ROOM SCHEDULE DETAILS</h2>
                            </div> 
                        
                            <div class="table-responsive">
                                        <br>
                                
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>ID</th>
                                                    <th> SCHEDULE DATE </th>
                                                    <th>START TIME</th>
                                                    <th>END TIME</th>
                                                    <th>DOCTOR NAME</th>
                                                    <th>NURSE NAME</th>
                                                    <th>ROOM ID </th>
                                                    <th>Edit </th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($resultSche->num_rows>0) {
                                                            while($row = $resultSche->fetch_assoc()){
                                                    ?>         
                                                                <tr>
                                                                <td><?php echo $row['id']; ?> </td>
                                                                <td><?php echo $row['scheduleDate']; ?> </td>
                                                                <td><?php echo $row['startTime']; ?> </td>
                                                                <td><?php echo $row['endTime']; ?> </td>
                                                                <td><?php echo $row['doctorName']; ?> </td>     
                                                                <td><?php echo $row['nurseName']; ?> </td>
                                                                <td><?php echo $row['roomID']; ?> </td>
                                                                <td> <a  class="lar la-edit" href="updateSche.php?id=<?php echo $row['id'];?>">
                                                                </a>&nbsp;<a class="las la-trash" href="deleteSche.php?id=<?php echo $row['id'];?>">
                                                                </a>

                                                                </td>
                                                                
                                                                </tr>

                                                                <?php }

                                                        } 
                                                        ?>  



                                                </tbody>

                                            </table> 
                            </div>

                        </div>
                    </div>

                            
                </div>
    
                
                                    

              
                
            </div>


        </main>

    </div>
    
</body>
</html>


