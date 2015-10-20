<?php

$department = stripcslashes($_GET["Department"]);
include "../configL.php";
global $conn;
$numberData = "SELECT * FROM ServiceDisplay where DepartmentId ='".$department."' ORDER BY CurrentServiced ASC ;";
$numberResult = $conn->query($numberData);

$arr = array();


    //fetch table rows from mysql db
    $result = mysqli_query($conn, $numberData) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }

    echo json_encode($emparray);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

