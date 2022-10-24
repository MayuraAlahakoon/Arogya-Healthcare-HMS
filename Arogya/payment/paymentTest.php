<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";


$sql = "SELECT * FROM paymentInfo ORDER BY id DESC
LIMIT 1";
$result = $conn->query($sql);


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
    <link rel="stylesheet" href="/Arogya/payment/paymentstyle.css">
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
                <li><a href="/Arogya/payment/payment.php"class="active"><span class="las la-dollar-sign"></span>
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
                        </div> 
                        <br>
                        <div class="card-body">
  

                            <div class="form-container">
                                <form action="/Arogya/payment/paymentDBTest.php" method="post">
                                    <br>

                                        <br>                       
                                        <input type="text" name="paymentID" required placeholder="Enter Payment ID">
                                        <br>
                        
                                        <input type="text" name="patientID" required placeholder="Enter Patient ID">
                                        <br> 
                                        <input type="text" name="doctorCharge" required placeholder="Enter Doctor Charge "> 
                                        <br>
                                        <input type="text" name="nurseCharge" required placeholder="Enter Nurse Charge "> 
                                        <br>
                                        <input type="text" name="roomCharge" required placeholder="Enter Room Charge "> 
                                        <br>
                                        <input type="text" name="serviceCharge" required placeholder="Enter Service Charge "> 
                                        <br>
                                    
                                        <input type="text" name="discount" required placeholder="Enter Discount ">
                                        <br>
                                        <input type="submit" name="submit" value="CALCULATE" class="form-btn">
                                        <br>
                                    </form>
         
                
                                    
                            </div>
                        </div>

                    </div>
                    <br>

                </div>
    
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h2>CHECK OUT</h2>
                            <button  type="button"> <a href="/Arogya/payment/paymentView.php" target="_self" ><b>See all</b> </a>  <span class="las la-arrow-right"></span></button>
                        </div>
                        <br>
                            <div class="card-body">
                                    <div class="table-responsive">
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
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($result->num_rows>0) {
                                                        while($row = $result->fetch_assoc()){
                                                            $id = $row['id'];
                                                            $tot = $row['totalAmount'];
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
                                                            </td>
                                                            
                                                            </tr>

                                                            <?php }

                                                    } 
                                                    ?>  



                                            </tbody>

                                        </table>                                    
                                                                      
                                    </div>

                                    
                                    
                                    
                                    
                                    
                            </div>
                        <br>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="/Arogya/payment/paymentDB.php" method="post">
                                    <h3>Pay here <h3>
                           

                                    <br> 
                                    <input type="text" name="totAmount"  value="<?php echo $tot;?>">
                                    <br>
                                
                                    <input type="text" name="paymentID" required placeholder="Enter Payment ID"value="<?php echo $id;?>">
                                    <br>
                                    <input type="text" name="paymentDate" required placeholder="Enter Payment Date "> 
                                    <br>
                                    <input type="text" name="paymentTime" required placeholder="Enter Payment Time "> 
                                    <br>

                                    <select name="method" >
                                        <option value="cash">CASH</option>
                                        <option value="visa/master">VISA/MASTER</option>
                                    </select>
                                    <br>
                                    <input type="text" name="cashierName" required placeholder="Enter Cashier Name "> 
                                    <br>
                                    <input type="submit" name="submit" value="PAY" class="form-btn">
                                    <br>
                

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


