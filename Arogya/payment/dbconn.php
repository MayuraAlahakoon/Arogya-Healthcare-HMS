<?php
$servername = 'localhost';
$username = 'mayura';
$password = '@ndr0@z5';
$dbname = 'arogya_dbbase';

//Create Connection 
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn -> connect_error) {
    die("Connecion failed:" . $conn->connect_error);
}


?>