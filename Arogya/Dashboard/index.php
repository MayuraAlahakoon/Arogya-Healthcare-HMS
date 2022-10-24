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
    <title>Home</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/Arogya/css/style.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
           <h2> <span class="las la-stethoscope"></span> <span>AROGYA HEALTHCARE</span></h2> 
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="" class="active"><span class="las la-igloo"></span>
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

                    Dashboard
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

            <div class="cards">
                <div class="card-single">

                    <div>
                        <h1>56</h1>
                        <span>PATIENTS</span>
                    </div>
                    <div>
                        <span class="las la-procedures"> </span>
                    
                    </div>
                </div>

                    <div class="card-single">

                        <div>
                            <h1>86</h1>
                            <span>ROOM AVAILABILITY</span>
                        </div>
                        <div>
                            <span class="las la-clipboard-list"> </span>
                        </div>
                    </div>

                    <div class="card-single">

                        <div>
                            <h1>86</h1>
                            <span>TODAY DOCTOR'S</span>
                        </div>
                        <div>
                            <span class="las la-stethoscope"> </span>
                        </div>
                    </div>

                    <div class="card-single">

                        <div>
                            <h1>15</h1>
                            <span>TODAY PAYMENTS</span>
                        </div>
                        <div>
                            <span class="las la-dollar-sign"> </span>
                        </div>
                    </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Appoiments</h2>

                            <button  type="button"> <a href="/media/andrewcod3x/andrew/Esoft/SEMESTER-2/WDD/Arogya/appoiments.html" target="_blank" ><b>See all</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Patient Name</td>
                                            <td>Room ID</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tom</td>
                                            <td>ROOM001</td>
                                            <td>
                                                <span class="status purple"></span>
                                                Very Bad
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harry</td>
                                            <td>ROOM002</td>
                                            <td>
                                                <span class="status pink"></span>
                                                Recovering
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>James</td>
                                            <td>ROOM003</td>
                                            <td>
                                                <span class="status orange"></span>
                                                Dead
                                            </td>
                                        </tr>
                                        
                                    </tbody>
    
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
    
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h2>New patient</h2>
                            <button  type="button"> <a href="#" target="_blank" ><b>See all</b> </a>  <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="/Arogya/img/360_F_227450952_KQCMShHPOPeb.jpg" alt="" width="40px" height="40px" >
                                    <div>
                                        <h4>Andrew Alex</h4>
                                        <small>Kandy</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>

                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="/Arogya/img/360_F_227450952_KQCMShHPOPeb.jpg" alt="" width="40px" height="40px" >
                                    <div>
                                        <h4>Ellis</h4>
                                        <small>Matale</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>

                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="/Arogya/img/360_F_227450952_KQCMShHPOPeb.jpg" alt="" width="40px" height="40px" >
                                    <div>
                                        <h4>Emma</h4>
                                        <small>Colombo</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>

                            </div>

                </div>    
                
            </div>


        </main>

    </div>
    
</body>
</html>


