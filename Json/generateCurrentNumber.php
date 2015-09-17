<?php
include "../configL.php";


    global $conn;
    $pepeData = "SELECT CurrentNumber, CBS, Department, EstimatedWaitMinutes FROM CurrentNumber where id ='1        ';";
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


$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
        ?>
