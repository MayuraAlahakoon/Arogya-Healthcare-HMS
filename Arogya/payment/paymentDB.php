<?php

    include_once 'dbconn.php';


    $totAmount = $_POST['totAmount'];
    $payID = $_POST['paymentID'];
    $payDate = $_POST['paymentDate'];
    $payTime = $_POST['paymentTime'];
    $method = $_POST['method'];
    $cashierName = $_POST['cashierName'];

    $insert= "INSERT INTO `paymentFinal`(`totAmount`, `paymentDate`, `paymentTime`, `method`, `cashierName`, `paymentID`) VALUES ('$totAmount','$payDate','$payTime','$method','$cashierName','$payID');";

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
