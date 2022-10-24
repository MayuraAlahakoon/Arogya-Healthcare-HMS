<?php
    include "dbconn.php";

    if(isset($_GET['id'])) {
        $pay_id = $_GET['id'];

    $sql = "DELETE FROM `paymentFinal` WHERE `id`='$pay_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location:/Arogya/payment/paymentView.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;

    }


    
}


?>