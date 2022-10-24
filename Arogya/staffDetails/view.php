
<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";
$sql = "SELECT * FROM `staff_Info`;";
$result = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Information</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/Arogya/loginDetails/loginViewStyle.css">
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
                <li><a href="/Arogya/staffDetails/staffDetails.php"class="active"><span class="las la-users" ></span>
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

                    STAFF INFORMATION
                </h2>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search here" />
                </div>
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
                            <h2>Staff Information Edit</h2>
                            <button  type="button"> <a href="/Arogya/staffDetails/staffDetails.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>
                        </div> 
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                        <br>
                                
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>STAFF ID</th>
                                                    <th>FIRST NAME </th>
                                                    <th>LAST NAME</th>
                                                    <th>NIC</th>
                                                    <th>GENDER</th>
                                                    <th>STAFF TYPE</th>
                                                    <th>1stLINE ADDRESS</th>
                                                    <th>2ndLINE ADDRESS</th>
                                                    <th>3rdLINE ADDRESS</th>
                                                    <th>AGE</th>
                                                    <th>CONTACT NUMBER</th>
                                                    <th>START DATE</th>
                                                    <th>END DATE</th>
                                                    <th>EDIT</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($result->num_rows>0) {
                                                            while($row = $result->fetch_assoc()){
                                                    ?>         
                                                                <tr>
                                                                <td><?php echo $row['staffID']; ?> </td>
                                                                <td><?php echo $row['firstName']; ?> </td>
                                                                <td><?php echo $row['lastName']; ?> </td>
                                                                <td><?php echo $row['nic']; ?> </td>
                                                                <td><?php echo $row['gender']; ?> </td>   
                                                                <td><?php echo $row['staffType']; ?> </td>
                                                                <td><?php echo $row['firstAdd']; ?> </td>
                                                                <td><?php echo $row['secondAdd']; ?> </td>
                                                                <td><?php echo $row['thirdAdd']; ?> </td>
                                                                <td><?php echo $row['age']; ?> </td> 
                                                                <td><?php echo $row['contactNumber']; ?> </td>
                                                                <td><?php echo $row['startDate']; ?> </td>
                                                                <td><?php echo $row['endDate']; ?> </td>
                                                                
                                                                <td> <a  class="lar la-edit" href="update.php?id=<?php echo $row['staffID'];?>">
                                                                </a>&nbsp;<a class="las la-trash" href="delete.php?id=<?php echo $row['staffID'];?>">
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
        
                
      
</body>
</html>



