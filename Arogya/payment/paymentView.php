<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";


$sql = "SELECT * FROM `paymentInfo`";
$result = $conn->query($sql);

$sqlPay = "SELECT * FROM `paymentFinal`";
$resultPay = $conn->query($sqlPay);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information</title>
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
                <li><a href="/Arogya/roomDetails/roomDetails.php"><span class="lar la-hospital"></span>
                    <span>Room Details</span></a>
                </li>
                <li><a href="/Arogya/staffDetails/staffDetails.php"><span class="las la-users"></span>
                    <span>Staff Details</span></a>
                </li>
                <li><a href="/Arogya/payment/paymentTest.php"class="active"><span class="las la-dollar-sign"></span>
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
                            <h2>PAYMENT DETIALS</h2>
                            <button  type="button"> <a href="/Arogya/payment/paymentTest.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <br>
                        <div class="card-body">
                            <div class="table-responsive">
                                        <br>
                                
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>ID</th>
                                                    <th>Doctor$ </th>
                                                    <th>Nurse$</th>
                                                    <th>Room$ </th>
                                                    <th>Service$ </th>
                                                    <th>Discount$</th>
                                                    <th>Total$ </th>
                                                    <th>PatientID </th>
                                                    <th>Edit </th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($result->num_rows>0) {
                                                            while($row = $result->fetch_assoc()){
                                                    ?>         
                                                                <tr>
                                                                <td><?php echo $row['id']; ?> </td>
                                                                <td><?php echo $row['doctorCharge']; ?> </td>
                                                                <td><?php echo $row['nurseCharge']; ?> </td>
                                                                <td><?php echo $row['roomCharge']; ?> </td>
                                                                <td><?php echo $row['serviceCharge']; ?> </td>     
                                                                <td><?php echo $row['discount']; ?> </td>
                                                                <td><?php echo $row['totalAmount']; ?> </td>
                                                                <td><?php echo $row['patientPay_ID']; ?> </td>
                                                                <td> <a  class="lar la-edit" href="updatePayDetails.php?id=<?php echo $row['id'];?>">
                                                                </a>&nbsp;<a class="las la-trash" href="deletePayDetails.php?id=<?php echo $row['id'];?>">
                                                                </a>

                                                                </td>
                                                                
                                                                </tr>

                                                                <?php }

                                                        } 
                                                        ?>  



                                                </tbody>

                                            </table> 
                            </div>
                            <br>
                            <div class="table-responsive">
                                        <br>
                                
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>ID</th>
                                                    <th>TotalAmount </th>
                                                    <th>Pay Date</th>
                                                    <th>Pay Time </th>
                                                    <th>Method </th>
                                                    <th>Cashier Name</th>
                                                    <th>Payment ID </th>
                                                    <th>Edit </th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($resultPay->num_rows>0) {
                                                            while($row = $resultPay->fetch_assoc()){
                                                    ?>         
                                                                <tr>
                                                                <td><?php echo $row['id']; ?> </td>
                                                                <td><?php echo $row['totAmount']; ?> </td>
                                                                <td><?php echo $row['paymentDate']; ?> </td>
                                                                <td><?php echo $row['paymentTime']; ?> </td>
                                                                <td><?php echo $row['method']; ?> </td>     
                                                                <td><?php echo $row['cashierName']; ?> </td>
                                                                <td><?php echo $row['paymentID']; ?> </td>
                                                                <td> <a  class="lar la-edit" href="updatePay.php?id=<?php echo $row['id'];?>">
                                                                </a>&nbsp;<a class="las la-trash" href="deletePay.php?id=<?php echo $row['id'];?>">
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


