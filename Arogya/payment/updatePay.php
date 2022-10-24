<?php

@include '/Arogya/login/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:/Arogya/login/login_form.php');
}

include "dbconn.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $totAmount = $_POST['totAmount'];
    $payID = $_POST['paymentID'];
    $payDate = $_POST['paymentDate'];
    $payTime = $_POST['paymentTime'];
    $method = $_POST['method'];
    $cashierName = $_POST['cashierName'];

    $sql = "UPDATE `paymentFinal` SET `totAmount`='$totAmount',`paymentDate`='$payDate',`paymentTime`='$payTime',`method`='$method',`cashierName`='$cashierName',`paymentID`='$payID' WHERE `id`='$id'";

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

    $sql = "SELECT * FROM `paymentFinal` WHERE `id`='$id' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $totAmount = $row['totAmount'];
            $payDate = $row['paymentDate'];
            $payTime = $row['paymentTime'];
            $method = $row['method'];
            $cashierName = $row['cashierName'];
            $payID = $row['paymentID'];
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

                            <button  type="button"> <a href="/Arogya/payment/paymentView.php" target="_self" ><b>Back</b> </a>  <span class="las la-arrow-right"></span></button>

                        </div> 
                        <br>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                        <br>                       
                                        <input type="hidden" name="id"  value="<?php echo $id;?>">
                                        
                                        <h5>Enter Total Amount:</h5>
                                        <br>
                                        <input type="text" name="totAmount" required placeholder="Enter Amount" value="<?php echo $totAmount;?>">
                                        
                                        <h5>Enter Payment Date:</h5>
                                        <br>
                                        <input type="text" name="paymentDate" required placeholder="Enter Payment Date "value="<?php echo $payDate;?>"> 
                                        
                                        <h5>Enter Payment Time:</h5>
                                        <br>
                                        <input type="text" name="paymentTime" required placeholder="Enter Payment Time"value="<?php echo $payTime;?>"> 
                                        
                                        <h5>Enter Payment Method:</h5>
                                        <br>
                                        <select name="method"value="<?php echo $method;?>" >
                                        <option value="cash">CASH</option>
                                        <option value="visa/master">VISA/MASTER</option>
                                        </select>
                                        
                                        <h5>Enter Cashier Name:</h5>
                                        <br>
                                        <input type="text" name="cashierName" required placeholder="Enter Cashier Name "value="<?php echo $cashierName;?>"> 
                                        
                                        <h5>Enter Payment ID:</h5>
                                        <br>
                                        <input type="text" name="paymentID" required placeholder="Enter Payment ID "value="<?php echo $payID;?>">
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
        header('location:/Arogya/payment/paymentView.php');
    
    }
    
    

}

?>




