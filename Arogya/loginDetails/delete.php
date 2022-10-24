<?php
    include "dbconn.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $sql = "DELETE FROM `login` WHERE `id` = '$id';";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location:/Arogya/loginDetails/loginView.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;

    }


    
}


?>