<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $firstAdd = $_POST['firstAdd'];
    $secondAdd = $_POST['secondAdd'];
    $thirdAdd = $_POST['thirdAdd'];
    $age = $_POST['age'];
    $conNumber = $_POST['number'];
    $admitDate = $_POST['admitDate'];
    $dischargeDate = $_POST['dischargeDate'];
    $admitTime = $_POST['admitTime'];
    $dischargeTime = $_POST['dischargeTime'];
    $roomID = $_POST['roomID'];



    $sql = "UPDATE `patientInfo` SET `firstName`='$fName',`lastName`='$lName',`nic`='$nic',`gender`='$gender',`firstAdd`='$firstAdd',`secondAdd`='$secondAdd',`thirdAdd`='$thirdAdd',`age`='$age',`contactNumber`='$conNumber',`admitDate`='$admitDate',`dischargeDate`='$dischargeDate',`admitTime`='$admitTime',`dischargeTime`='$dischargeTime',`room_ID`='$roomID' WHERE `id` = '$id';";

    $result = $conn->query($sql);

    if($result == TRUE){
        header('location:/Arogya/patientInfo/view.php');
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    


}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `patientInfo` WHERE `id`='$id' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $fName = $row['firstName'];
            $lName = $row['lastName'];
            $nic = $row['nic'];
            $gender = $row['gender'];
            $firstAdd = $row['firstAdd'];
            $secondAdd = $row['secondAdd'];
            $thirdAdd = $row['thirdAdd'];
            $age = $row['age'];
            $conNumber = $row['contactNumber'];
            $admitDate = $row['admitDate'];
            $dischargeDate = $row['dischargeDate'];
            $admitTime = $row['admitTime'];
            $dischargeTime = $row['dischargeTime'];
            $roomID = $row['room_ID'];
            
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
                <li><a href="/Arogya/patientInfo/testpatient.php"class="active"><span class="las la-procedures"></span>
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
                <li><a href="/Arogya/payment/payment.php"><span class="las la-dollar-sign"></span>
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

                    PATIANT INFORMATION
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
                            <button  type="button"> <a href="/Arogya/patientInfo/view.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <br>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                        <br>                       
                                        <input type="hidden" name="id"  value="<?php echo $id;?>">
                                        
                            
                                        <h5>First Name:</h5>
                                        <br>
                                        <input type="text" name="fname" value="<?php echo $fName;?>">
                                        
                                        <h5>Last Name:</h5>
                                        <br>
                                        <input type="text" name="lname" value="<?php echo $lName;?>"> 
                                        
                                        <h5>NIC :</h5>
                                        <br>
                                        <input type="text" name="nic" value="<?php echo $nic;?>"> 
                                        <h5>Gender :</h5>
                                        <br>
                                        <select name="gender" value="<?php echo $gender;?>">
                                            <option value="male">MALE</option>
                                            <option value="female"> FEMALE </option>
                                        </select>
                                    
                    
                                        <br>
                                        <h5>Frist Line Address :</h5>
                                        <br>
                                        <input type="text" name="firstAdd" value="<?php echo $firstAdd;?>">
                                        <br>
                                        <h5>Second Line Address :</h5>
                                        <br>
                                        <input type="text" name="secondAdd" value="<?php echo $secondAdd;?>"> 
                                        <br>
                                        <h5>Third Line Address :</h5>
                                        <br>
                                        <input type="text" name="thirdAdd" value="<?php echo $thirdAdd;?>"> 
                                        <br>
                                        <h5> Age :</h5>
                                        <br>
                                        <input type="text" name="age" value="<?php echo $age;?>"> 
                                        <br>
                                        <h5> Contact Number :</h5>
                                        <br>
                                        <input type="text" name="number" value="<?php echo $conNumber;?>">
                                        <br>
                                        <h5>Admit Date :</h5>
                                        <br>
                                        <input type="text" name="admitDate" value="<?php echo $admitDate;?>"> 
                                        <br>
                                        <h5>Discharge Date :</h5>
                                        <br>
                                        <input type="text" name="dischargeDate" value="<?php echo $dischargeDate;?>"> 
                                        <br>
                                        <h5>Admit Time :</h5>
                                        <br>
                                        <input type="text" name="admitTime" value="<?php echo $admitTime;?>"> 
                                        <br>
                                        <h5>Discharge Time :</h5>
                                        <br>
                                        <input type="text" name="dischargeTime" value="<?php echo $dischargeTime;?>"> 
                                        <h5>Room ID :</h5>
                                        <br>
                                        <input type="text" name="roomID" value="<?php echo $roomID;?>"> 
                                        <br>
                                        

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
        header('location:/Arogya/patientInfo/view.php');
    
    }
    
    

}

?>




