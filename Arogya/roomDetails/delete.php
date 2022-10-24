<?php
    include "dbconn.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $sql = "DELETE FROM `roomDetails` WHERE `roomID`='$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location:/Arogya/roomDetails/view.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;

    }


    
}


?>