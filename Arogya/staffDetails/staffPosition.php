<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'arogya_dbbase';
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn -> connect_error) {
        die("Connecion failed:" . $conn->connect_error);
    }
    
    $possid = $_POST['possID'];
    $possNameType = $_POST['poss_type'];
    


    $sql = " INSERT INTO  staff_role (poss_ID, poss_Name) VALUES ('$possid','$possNameType');";
    mysqli_query($conn, $sql);
    header('location:/Arogya/staffDetails/staffDetails.php');

    $conn->close();




?>