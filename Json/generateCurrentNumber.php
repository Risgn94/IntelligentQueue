<?php

include "../configL.php";
global $conn;
$numberData = "SELECT CurrentNumber, Organization, Department, EstimatedWaitMinutes FROM CurrentNumber where id ='1';";
$numberResult = $conn->query($numberData);
if ($numberResult->num_rows > 0) {
    // output data of each row
    while ($nRow = $numberResult->fetch_assoc()) {
        $arr = array($nRow["CurrentNumber"], $nRow["Organization"], $nRow["Department"], $nRow["EstimatedWaitMinutes"]);
        echo json_encode($arr);
    }
} else {
    echo "No data with chosen id exists";
}
?>
