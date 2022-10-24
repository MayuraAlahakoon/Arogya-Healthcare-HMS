<?php

    include_once 'dbconn.php';

    $paymentID = $_POST['paymentID'];
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


    
    $insert = "INSERT INTO `paymentInfo`( `id`,`doctorCharge`, `nurseCharge`, `roomCharge`, `serviceCharge`, `discount`, `totalAmount`, `patientPay_ID`)
    VALUES ('$paymentID','$doctorCharge','$nurseCharge','$roomCharge','$serviceCharge','$discount','$totAmount','$patientID');" ;
    $result = $conn->query($insert);

    if($result == TRUE) {
        echo "New record created succesfully";
    }
    else{
        echo "Error:" . $insert . "<br>". $conn->error;
    }


    header("Location:/Arogya/payment/paymentTest.php");
    $conn->close();


?>
