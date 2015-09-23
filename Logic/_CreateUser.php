<?php
include "../configL.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $_GET["inputEmail"];?><br>
<?php echo $_GET["inputFPassword"];?><br>
<?php echo $_GET["inputRPassword"];?><br>
<?php echo $_GET["firstname"];?><br>
<?php echo $_GET["lastname"];?><br>
<?php echo $_GET["phone"];?><br>

<?php
$email =  $_GET["inputEmail"];
$passwordF =  $_GET["inputFPassword"];
$passwordR = $_GET["inputRPassword"];
$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];
$phone = $_GET["phone"];

$sql = "INSERT INTO UserData (Email, password, firstname, lastname, phone)
VALUES ('".$email."', '".$passwordF."', '".$firstname."', '".$lastname."', '".$phone."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

