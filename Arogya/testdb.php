<?php
$servername = 'localhost';
$username = 'mayura';
$password = '@ndr0@z5';
$dbname = 'user_db';


$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn -> connect_error) {
    die("Connecion failed:" . $conn->connect_error);
}

$sql = " CREATE DATABASE TESTDB";
if ($conn->query($sql) === TRUE){
    echo "Database created successfully";

}else{
    echo "Error creating database:" . $conn->error;
}

$conn->close();

?>