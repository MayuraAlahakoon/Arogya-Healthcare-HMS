<?php
$servername = 'localhost';
$username = 'mayura';
$password = '@ndr0@z5';
$dbname = 'arogya_dbbase';


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error) {
    die("Connecion failed:" . $conn->connect_error);
}


?>