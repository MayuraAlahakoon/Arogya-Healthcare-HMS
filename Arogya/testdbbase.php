<?php
$servername = 'localhost';
$username = 'mayura';
$password = '@ndr0@z5';
$dbname = 'user_db';


$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn -> connect_error) {
    die("Connecion failed:" . $conn->connect_error);
}

if(isset($_POST['submit'])){

    $Id = mysqli_real_escape_string($conn, $_POST['id']);
    $firstName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lName']);
    $NIC = mysqli_real_escape_string($conn, $_POST['nic']);
    $Gender = $_POST['gender'];
    $firstLineAdd = mysqli_real_escape_string($conn, $_POST['firstLineAddress']);
    $secondLineAdd = mysqli_real_escape_string($conn, $_POST['secondLineAddress']);
    $thirdLineAdd = mysqli_real_escape_string($conn, $_POST['thirdLineAddress']);
    $Age = mysqli_real_escape_string($conn, $_POST['age']);
    $contactNo = mysqli_real_escape_string($conn, $_POST['contactNumber']);
    $roomNumber = mysqli_real_escape_string($conn, $_POST['roomNo']);
    $admitate = mysqli_real_escape_string($conn, $_POST['admitDate']);
    $dischargeate = mysqli_real_escape_string($conn, $_POST['dischargeDate']);

    $select = " SELECT * FROM patientDetails WHERE nic = '$nic' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'Patient already registered!';

        }else{
            $insert = "INSERT INTO `patientDetails`(`id`,`firstName`, `lastName`, `nic`, `gender`, `firstAddLine`, `secondAddLine`, `thirdAddLine`, `age`, `contactNumber`, `admitDate`, `dischargeDate`, `room_ID`) VALUES('$Id','$firstName','$lastName','$NIC','$Gender','$firstLineAdd', '$secondLineAdd', '$thirdLineAdd', '$Age', '$contactNo', '$admitDate', '$dischargeDate', '$roomNumber')";
            mysqli_query($conn, $insert);
            
        }

};


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h3> PATIENT DETAILS </h3>
                <br> <br>
                <form action="testdbbase.php" method="post">
                    <?php
                    if(isset($error))
                    {
                        foreach($error as $error){
                            echo '<span class="error-msg">' .$error. '</span>';
                        };
                    };
                    ?>
                    <input type="text" name="id" required placeholder="Enter Patient's ID">

                    <input type="text" name="fName" required placeholder="Enter Patient's First Name">
        
                    <input type="text" name="lName" required placeholder="Enter Patient's Last Name">
        
                    <input type="text" name="nic" required placeholder="Enter Patient's NIC Number">

                    <select name="gender">
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                    </select>
                                                 
                    <input type="text" name="firstLineAddress" required placeholder="Enter Patient's Address 1st Line">
                                     
                    <input type="text" name="secondLineAddress" required placeholder="Enter Patient's Address 2nd Line">
                                    
                    <input type="text" name="thirdLineAddress" required placeholder="Enter Patient's Address 3rd Line">

                    <input type="text" name="age" required placeholder="Enter Patient's Age">
                                    
                    <input type="text" name="contactNumber" required placeholder="Contact Number">
                                                                               
                    <input type="text" name="roomNo" required placeholder="Room Number" >
             
                    <input type="text" name="admitDate" required placeholder="Admin Date dd-mm-yy">
                                    
                    <input type="text" name="dischargeDate" required placeholder="Discharge Date dd-mm-yy">

                    <input type="submit" name="submit" value="SUBMIT" class="form-btn"> <br> 
                    <input type="submit" name="submit" value="EDIT" class="form-btn"> <br>

                                    

                </form>



            </div>

</body>
</html>