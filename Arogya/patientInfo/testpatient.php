
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
    <title>Patient Information</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/Arogya/staffDetails/staffStyle.css">
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
                <li><a href="/Arogya/patientInfo/patient-details.php" class="active"><span class="las la-procedures"></span>
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

                    PATIENT INFORMATION
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

        <div class="cards">

            <div class="form-container">

                <h3> PATIENT DETAILS </h3>

                <br> <br>
                <form action="/Arogya/patientInfo/patientconfig.php" method="post">


                    <input type="text" name="fName" required placeholder="Enter Patient's First Name">
        
                    <input type="text" name="lName" required placeholder="Enter Patient's Last Name">
        
                    <input type="text" name="nic" required placeholder="Enter Patient's NIC Number">

                    <select name="gender">
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                    </select>
                                                 
                    <input type="text" name="firstLineAddress" required placeholder="Enter Patient's Address 1st Line">
                                     
                    <input type="text" name="secondLineAddress" required placeholder="Enter Patient's Address 2nd Line">
                                    
                    <input type="text" name="thirdLineAddress" required placeholder="Enter Patient's Address 3rd Line">

                    <input type="text" name="age" required placeholder="Enter Patient's Age">
                                    
                    <input type="text" name="contactNumber" required placeholder="Contact Number">
                                                                               
                    <input type="text" name="roomNo" required placeholder="Room Number" >
             
                    <input type="text" name="admitDate" required placeholder="Admin Date yyyy-mm-dd">
                                    
                    <input type="text" name="dischargeDate" required placeholder="Discharge Date yyyy-mm-dd">
                    <input type="text" name="admitTime" required placeholder="Admin Time hh:mm:ss">
                    <input type="text" name="dischargeTime" required placeholder="Discharge Time hh:mm:ss">

                    <input type="submit" name="submit" value="SUBMIT" class="form-btn">  


                </form>
                

            </div>

            <div class="form-container">
                <form action="/Arogya/patientInfo/guardianInfoDB.php" method="post">
                    <h3> GUARDIAN INFORMATION <h3>

                    <br> <br>

                    <input type="text" name="fName" required placeholder="Enter Guardian First Name">
        
                    <input type="text" name="lName" required placeholder="Enter Guardian Last Name">
                    <input type="text" name="patientID" required placeholder="Enter Patient ID">

        
                    <input type="text" name="nic" required placeholder="Enter Guardian NIC Number">

                    <select name="gender">
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                    </select>
                                                 
                    <input type="text" name="firstLineAddress" required placeholder="Enter Guardian Address 1st Line">
                                     
                    <input type="text" name="secondLineAddress" required placeholder="Enter Guardian Address 2nd Line">
                                    
                    <input type="text" name="thirdLineAddress" required placeholder="Enter Guardian Address 3rd Line">

                    <input type="text" name="age" required placeholder="Enter Guardian Age">
                                    
                    <input type="text" name="contactNumber" required placeholder="Contact Number">
                                                                               
                    <input type="text" name="relationship" required placeholder="Relationship">
             
                    <input type="text" name="Date" required placeholder="Date dd-mm-yy">
                                    

                    <input type="submit" name="submit" value="SUBMIT" class="form-btn">

                
                </form>
                


            </div>
            <div class="form-container">
                <form action="/Arogya/patientInfo/view.php" method="post">
                        <input type="submit" name="edit" value="EDIT" class="form-btn">  



                </form>
            </div>



           
        </div>

    </main>
        
                
    
    
</body>
</html>



