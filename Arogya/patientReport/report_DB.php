
<?php
    include_once 'dbconn.php';

    $patientName = $_POST['patientName'];
    $date = $_POST['reportDate'];
    $time = $_POST['reportTime'];
    $report = $_POST['report'];
    $staffID = $_POST['staffid'];

    $sql = "INSERT INTO patientReport(patientName, reportDate, reportTime, report, staffID) VALUES ('$patientName','$date','$time','$report','$staffID');";
    mysqli_query($conn, $sql);
    header('location:/Arogya/patientReport/report.php');

    $conn->close();

?>