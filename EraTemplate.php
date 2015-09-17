<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "configL.php";

function getPepes($eraID)
{
    global $conn;
    $pepeData = "SELECT Title, Desciption, image_url, Painted FROM pepes where pepeeras ='".$eraID."';";
    $pepesResult = $conn->query($pepeData);
    if ($pepesResult->num_rows > 0) {
        // output data of each row
        while ($pRow = $pepesResult->fetch_assoc()) {
            echo "<h2>" . $pRow["Title"] . "</h2>";
            echo "<div class=\"pepeWrapper\">"
                    . "<div class=\"pepeTextWrapper\">"
                    ."<p>".$pRow['Desciption']."</p>"
                    . "</div>"
                    . "<div class=\"pepeImgWrapper\">"
                    ."<img class=\"img-responsive\" src=\"".$pRow['image_url']."\" title=\"".$pRow['Title']."\"></img>"
                    . "</div>"
                ."</div>";
            echo "<br/><hr><br/>";
        }
    } else {
        echo "No Pepes has yet been added to this category... :(";
    }
}
function getEra($eraName) {
    global $conn;
    if($eraName != "all")
    { 
    $sqlTitle = "SELECT Title, Description, Era_ID FROM pepeeras where Name = '" . $eraName . "';";
    $resultT = $conn->query($sqlTitle);
    if ($resultT->num_rows > 0) {
        // output data of each row
        while ($row = $resultT->fetch_assoc()) {
            echo "<h1>" . $row["Title"] . "</h1>";
            echo "<p>" . $row["Description"] . "</p>";
            echo "<br/><hr><hr><br/>";
            getPepes($row['Era_ID']);
        }
    } else {
        echo "0 results";
    }
    
    echo'<script type="text/javascript">
            document.getElementById("menuGallery").className = "active";
            document.getElementById("'.$_GET['category'].'").className = "active";
    </script>';
    }
 else {
     $sqlTitle = "SELECT Title, Description, Name FROM pepeeras;";
     $resultT = $conn->query($sqlTitle);

    if ($resultT->num_rows > 0) {
        // output data of each row
        while ($row = $resultT->fetch_assoc()) {
            echo "<h1>" . $row["Title"] . "</h1>";
            echo "<p>" . $row["Description"] . "</p>";
            echo "<a href=\"?i=Era&category=".$row["Name"]."\">View the gallery of ".$row["Title"].".</a>";
            echo "<br/><hr><br/>";
        }
    } else {
        echo "This Category has not yet any description or material.";
    }
     echo'<script type="text/javascript">
            document.getElementById("menuGallery").className = "active";
            document.getElementById("'.$_GET['category'].'").className = "active";
    </script>';
 }
    
    $conn->close();
}

?>


