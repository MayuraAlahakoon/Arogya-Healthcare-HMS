<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
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

                            <button  type="button"> <a href="/media/andrewcod3x/andrew/Esoft/SEMESTER-2/WDD/Arogya/appoiments.html" target="_blank" ><b>See all</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <br>
  

                        <div class="form-container">
                            <form action="/Arogya/payment/paymentDB.php" method="post">
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
                                
                                    <label for="tot" required placeholder="Enter Discount "></label>
                                    <br>
                                    <br>
                                    <br>
                                    <input type="submit" name="submit" value="CALCULATE" class="form-btn">
                                    <br>
                                    <input type="submit" name="submit" value="EDIT" class="form-btn">               

                                </form>

                        </div>


                    </div>

                </div>
    
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h2>CHECK OUT</h2>
                            <button  type="button"> <a href="#" target="_blank" ><b>See all</b> </a>  <span class="las la-arrow-right"></span></button>
                        </div>
                        <br>
                        <div class="card-body">
                        <div class="form-container">
                            <form action="/Arogya/payment/paymentDB.php" method="post">

                                <br> 
                            
                                <input type="text" name="patientID" required placeholder="Enter Patient ID">
                                <br> 
                                <label type="text" name="totamount" required placeholder="Enter Total Amount $ "></label>
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
                                <input type="submit" name="submit" value="EDIT" class="form-btn">  <br>
              

                            </form>

                        </div>
                    </div>
                

                </div>    
                
            </div>


        </main>

    </div>
    
</body>
</html>


