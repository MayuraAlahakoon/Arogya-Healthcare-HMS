<?php
    include "dbconn.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $sql = "DELETE FROM `staff_Info` WHERE `staffID`='$id';";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location:/Arogya/staffDetails/view.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;

    }


    
}


?>