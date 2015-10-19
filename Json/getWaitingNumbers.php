<?php

include "../configL.php";
global $conn;
$numberData = "SELECT * FROM WaitingNumbers where DepartmentId ='1';";
$numberResult = $conn->query($numberData);

$arr = array();


    //fetch table rows from mysql db
    $sql = "select * from tbl_employee";
    $result = mysqli_query($conn, $numberData) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }

    echo json_encode($emparray);
?>


