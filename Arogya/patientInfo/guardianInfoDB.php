<?php


    include_once 'dbconn.php';

    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $patientID = $_POST['patientID'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $firstLineAdd = $_POST['firstLineAddress'];
    $secondLineAdd = $_POST['secondLineAddress'];
    $thirdLineAdd = $_POST['thirdLineAddress'];
    $age = $_POST['age'];
    $contactNumber = $_POST['contactNumber'];
    $relationship = $_POST['relationship'];
    $date = $_POST['Date'];

    $insert = "INSERT INTO  guardianInfo (firstName,lstName,nic_guard,gender,firstAdd,secondAdd,thirdAdd,age_guard,contactNumber,relationship,date,patientGuard_ID) VALUES('$firstName','$lastName','$nic','$gender','$firstLineAdd','$secondLineAdd', '$thirdLineAdd', '$age', '$contactNumber', '$relationship', '$date', '$patientID');";
    mysqli_query($conn, $insert);

    header("Location:/Arogya/patientInfo/testpatient.php");
    




?>
