<?php
    include_once 'dbconn.php';

    $scheDate = $_POST['scheduledDate'];
    $sTime = $_POST['startTime'];
    $eTime = $_POST['endTime'];
    $drname = $_POST['doctorName'];
    $nurname = $_POST['nurseName']; 
    $roomId = $_POST['roomScheID'];


    $sql = " INSERT INTO  roomSchedule(scheduleDate,  startTime, endTime, doctorName, nurseName, roomID) VALUES ('$scheDate', '$sTime','$eTime', '$drname','$nurname','$roomId');";
    mysqli_query($conn, $sql);
    header('location:/Arogya/roomDetails/roomDetails.php');

    $conn->close();




?>