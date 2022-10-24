<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Information</title>
</head>
<body>
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
    <title>Staff Details</title>
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
                <li><a href="/Arogya/patientInfo/testpatient.php" ><span class="las la-procedures"></span>
                    <span>Patient Details</span></a>
                </li>


                <li><a href="/Arogya/patientReport/report.php"><span class="las la-notes-medical"></span>
                    <span>Patient Report</span></a>
                </li>

                <li><a href="/Arogya/roomDetails/roomDetails.php" ><span class="lar la-hospital"></span>
                    <span>Room Details</span></a>
                </li>
                <li><a href="/Arogya/staffDetails/staffDetails.php"class="active"><span class="las la-users"></span>
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

                    STAFF DETAILS
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
                <form action="/Arogya/staffDetails/staffInfo_DB.php" method="post">

                    <h3>STAFF INFORMATION</h3>

                    <br> <br>
                    <input type="text" name="staffID" required placeholder="Enter Staff ID">

                    <input type="text" name="fName" required placeholder="Enter Doctor's First Name">

                    
                    <input type="text" name="lName" required placeholder="Enter Doctor's Last Name">


                    <input type="text" name="nic" required placeholder="Enter Doctor's NIC Number">

                    <select name="gender">
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                    </select>
                    <select name="posi_type">
                        <option value="doctor">DOCTOR</option>
                        <option value="nurse">NURSE</option>
                    </select> 
                        
                    
                    <input type="text" name="firstLineAddress" required placeholder="Enter Doctor's Address 1st Line">


                    <input type="text" name="secondLineAddress" required placeholder="Enter Doctor's Address 2nd Line">

                    <input type="text" name="thirdLineAddress" required placeholder="Enter Doctor's Address 3rd Line">


                    <input type="text" name="age" required placeholder="Enter Doctor's Age">
                    
                    <input type="text" name="contactNumber" required placeholder="Contact Number">
                                        
                
                    <input type="text" name="startDate" required placeholder="Started dd-mm-yy"> <br>


                    <input type="text" name="endDate" required placeholder="End dd-mm-yy"> <br>


                    <input type="submit" name="submit" value="SUBMIT" class="form-btn"> 

                </form>
                <form action='/Arogya/staffDetails/view.php' method='get'>
                    <input type="submit" name="submit" value="EDIT" class="form-btn"><br>
                </form>

            </div>
          

        </div>

    </main>
        
                
    
    
</body>
</html>



