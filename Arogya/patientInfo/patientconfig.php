<?php

    
    include_once 'dbconn.php';
    session_start();

    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $firstLineAdd = $_POST['firstLineAddress'];
    $secondLineAdd = $_POST['secondLineAddress'];
    $thirdLineAdd = $_POST['thirdLineAddress'];
    $age = $_POST['age'];
    $contactNumber = $_POST['contactNumber'];
    $admitDate = $_POST['admitDate'];
    $dischargeDate = $_POST['dischargeDate'];
    $admitTime = $_POST['admitTime'];
    $dischargeTime = $_POST['dischargeTime'];
    $roomID = $_POST['roomNo'];




    $insert = "INSERT INTO patientInfo(firstName,lastName,nic,gender,firstAdd,secondAdd,thirdAdd,age,contactNumber,admitDate,dischargeDate,admitTime,dischargeTime,room_ID) VALUES('$firstName','$lastName','$nic','$gender','$firstLineAdd','$secondLineAdd', '$thirdLineAdd', '$age', '$contactNumber', '$admitDate', '$dischargeDate', '$admitTime', '$dischargeTime', '$roomID');";
    $result = $conn->query($insert);

    if ($result == TRUE){
        $_SESSION['status'] = "Data inserted Successfully";
        header("Location:/Arogya/patientInfo/testpatient.php");


    }else{
        echo "Something went wrong";


    };
    
    




?>
