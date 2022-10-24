<?php

    include_once 'dbconn.php';

    $ID = $_POST['roomID'];
    $name = $_POST['roomName'];

    $sqlSelect = "SELECT * FROM roomDetails WHERE roomID = '$ID' && roomName = '$name'";
    $result = mysqli_query($conn, $sqlSelect);

    if(mysqli_num_rows($result)> 0) {
        $error[] = 'room is already exist!';

    }else{
        $sql = " INSERT INTO  roomDetails (roomID, roomName) VALUES ('$ID','$name');";
        mysqli_query($conn, $sql);

        header('location:/Arogya/roomDetails/roomDetails.php');

    };
?>


