<?php

//TEST URL: http://localhost/intelligentQueue/json/jsonData.php?data=getInLine&Department=1&User=2

$dep = stripcslashes($_GET["Department"]);
$userID = stripcslashes($_GET["User"]);

include "../configL.php";

$nextNumberSQL = "SELECT MAX(WaitNr) from WaitingNumbers where DepartmentId = ".$dep.";";

$NNResult = $conn->query($nextNumberSQL);
$NNData = $NNResult->fetch_assoc();
$NN = $NNData['MAX(WaitNr)'];
$NNFinal = $NN+1;

$updateRow = "INSERT INTO WaitingNumbers (DepartmentId, WaitNr, UserID) VALUES ('".$dep."', '".$NNFinal."', '".$userID."')";

if($conn->query($updateRow) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>