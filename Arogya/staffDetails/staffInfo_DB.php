
<?php
    include_once 'dbconn.php';

    $staff_ID = $_POST['staffID'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $NIC = $_POST['nic'];
    $Gender = $_POST['gender'];
    $staffType = $_POST['posi_type'];
    $firstAdd = $_POST['firstLineAddress'];
    $secondAdd = $_POST['secondLineAddress'];
    $thirdAdd = $_POST['thirdLineAddress'];
    $Age = $_POST['age'];
    $contact = $_POST['contactNumber'];
    $start_Date = $_POST['startDate'];
    $end_Date = $_POST['endDate'];

    $sql = "INSERT INTO staff_Info(staffID, firstName, lastName, nic, gender, staffType, firstAdd, secondAdd, thirdAdd, age, contactNumber, startDate, endDate) VALUES ('$staff_ID','$firstName','$lastName','$NIC','$Gender','$staffType','$firstAdd','$secondAdd','$thirdAdd','$Age','$contact','$start_Date','$end_Date');";
    mysqli_query($conn, $sql);
    header('location:/Arogya/staffDetails/staffDetails.php');

    $conn->close();

?>