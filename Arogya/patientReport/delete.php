<?php
    include "dbconn.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $sql = "DELETE FROM `patientReport` WHERE `id`='$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location:/Arogya/patientReport/view.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;

    }


    
}


?>