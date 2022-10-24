<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
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
    <link rel="stylesheet" href="Dashboard/style.css">
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
                    <span>Dashboad</span></a>
                </li>
                <li><a href="/Arogya/patientInfo/patient-details.php"><span class="las la-procedures"></span>
                    <span>Patient Details</span></a>
                </li>
                <li><a href=""><span class="las la-clipboard-list"></span>
                    <span>Room Details</span></a>
                </li>
                <li><a href=""><span class="lar la-hospital"></span>
                    <span>Ward Details</span></a>
                </li>
                <li><a href=""><span class="las la-users"></span>
                    <span>Staff Details</span></a>
                </li>
                <li><a href=""><span class="las la-users-cog"></span>
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

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search here" />
                </div>

                <div class="user-wrapper">
                    <img src="/Arogya/img/360_F_227450952_KQCMShHPOPeb.jpg" width="80px" height="80px" alt="">
                    <div class="user-button">
                        <small>user</small>
                        <h4><?php echo $_SESSION['user_name']?></h4>
    
                        <button> <a href="/Arogya/login/logout.php" target="_self" >LOGOUT</a><span class="las la-arrow-right"></span></button>

                        
                    </div>
                </div>
        </header>

        <main>

            <div class="cards">
                <div class="card-single">

                    <div>
                        <h1>56</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"> </span>
                    
                    </div>
                </div>

                    <div class="card-single">

                        <div>
                            <h1>86</h1>
                            <span>Projects</span>
                        </div>
                        <div>
                            <span class="las la-clipboard-list"> </span>
                        </div>
                    </div>

                    <div class="card-single">

                        <div>
                            <h1>86</h1>
                            <span>Orders</span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"> </span>
                        </div>
                    </div>

                    <div class="card-single">

                        <div>
                            <h1>$6k</h1>
                            <span>Income</span>
                        </div>
                        <div>
                            <span class="lab la-google-wallet"> </span>
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
                                            <td>Project Title</td>
                                            <td>Department</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop App</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
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
                                        <small>CEO Excerpt</small>
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
                                        <h4>Andrew Alex</h4>
                                        <small>CEO Excerpt</small>
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
                                        <h4>Andrew Alex</h4>
                                        <small>CEO Excerpt</small>
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


