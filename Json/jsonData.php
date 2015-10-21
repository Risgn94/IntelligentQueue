<?php   
$data = stripcslashes($_GET["data"]);
        switch ($data) {
            case "getServicedNumber":
                include_once("./getServicedNumber.php");
                break;
            case "getWaitingNumbers":
                include_once("./getWaitingNumbers.php");
                break;
            case "updateWaitingLine":
                include_once './updateWaitingLine.php';
                break;
            case "getInLine":
                include_once './getInLine.php';
                break;
            default:
                include_once 'ErrorPage.php';
                break;
            }
        ?>