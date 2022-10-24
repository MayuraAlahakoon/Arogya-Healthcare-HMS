<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $doctorCharge = $_POST['doctorCharge'];
    $nurseCharge = $_POST['nurseCharge'];
    $roomCharge = $_POST['roomCharge'];
    $serviceCharge = $_POST['serviceCharge'];
    $discount = $_POST['discount'];
    $amount = $doctorCharge + $nurseCharge + $roomCharge + $serviceCharge;
    if ($discount > 0){
        $totAmount = $amount - $discount;
    }else{
        $totAmount = $amount;
    }
    $patientID = $_POST['patientID'];



    $sql = "UPDATE `paymentInfo` SET `doctorCharge`='$doctorCharge',`nurseCharge`='$nurseCharge',`roomCharge`='$roomCharge',`serviceCharge`='$serviceCharge',`discount`='$discount',`totalAmount`='$totAmount',`patientPay_ID`='$patientID' WHERE `id`='$id'";

    $result = $conn->query($sql);

    if($result == TRUE){
        header('location:/Arogya/payment/paymentView.php');
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    


}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `paymentInfo` WHERE `id`='$id' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $doctorCharge = $row['doctorCharge'];
            $nurseCharge = $row['nurseCharge'];
            $roomCharge = $row['roomCharge'];
            $serviceCharge = $row['serviceCharge'];
            $discount = $row['discount'];
            $totAmount = $row['totalAmount'];
            $patientID = $row['patientID'];
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

                            <button  type="button"> <a href="/Arogya/payment/paymentView.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <br>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                <br>                       
                                    <input type="hidden" name="id" required placeholder="Enter Payment ID" value="<?php echo $id;?>">
                                    
                        
                                    
                                    <h5>Enter Doctor Charge:</h5><br>
                                    <input type="text" name="doctorCharge" required placeholder="Enter Doctor Charge "value="<?php echo $doctorCharge;?>"> 
                                    
                                    <h5>Enter Nurse Charge:</h5><br>
                                    <input type="text" name="nurseCharge" required placeholder="Enter Nurse Charge "value="<?php echo $nurseCharge;?>"> 
                                    
                                    <h5>Enter Room Charge:</h5><br>
                                    <input type="text" name="roomCharge" required placeholder="Enter Room Charge "value="<?php echo $roomCharge;?>"> 
                                    
                                    <h5>Enter Service Charge:</h5><br>
                                    <input type="text" name="serviceCharge" required placeholder="Enter Service Charge "value="<?php echo $serviceCharge;?>"> 
                                    
                                    <h5>Enter Discount:</h5><br>
                                    <input type="text" name="discount" required placeholder="Enter Discount "value="<?php echo $discount;?>">
                                    
                                    <h5>Total Amount:</h5><br>
                                    <input type="text" name="total" required placeholder="Total Amount "value="<?php echo $totAmount;?>">
                                    
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
        header('location:/Arogya/payment/paymentView.php');
    
    }
    
    

}

?>




