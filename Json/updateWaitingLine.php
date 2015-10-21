<?php

//TEST URL: http://localhost/intelligentQueue/json/jsonData.php?data=updateWaitingLine&Department=1&RegisterNr=2


include "../configL.php";
global $conn;
$registernr = stripcslashes($_GET["RegisterNr"]);
$dep = stripcslashes($_GET["Department"]);
//$currentserviced = stripcslashes($_GET["CurrentServiced"]);

$currentNumberSQL = "SELECT CurrentServiced FROM ServiceDisplay where RegisterNr =".$registernr." AND departmentId = ".$dep.";";
$CNResult = $conn->query($currentNumberSQL);
$CNData = $CNResult->fetch_assoc();

$numberToBeDeleted = $CNData['CurrentServiced'];

$nextNumberSQL = "SELECT MAX(CurrentServiced) from ServiceDisplay where DepartmentId = ".$dep.";";

$NNResult = $conn->query($nextNumberSQL);
$NNData = $NNResult->fetch_assoc();
$NN = $NNData['MAX(CurrentServiced)'];
$NNFinal = $NN+1;
echo $NNFinal;

$updateWaitNumberSQL = "UPDATE ServiceDisplay SET CurrentServiced ='".$NNFinal."' WHERE RegisterNr = ".$registernr.";";
        
if($conn->query($updateWaitNumberSQL) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}        

$deleteWaitRow = "DELETE FROM WaitingNumbers WHERE ID='".$numberToBeDeleted."';";

if($conn->query($deleteWaitRow) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}        
?>