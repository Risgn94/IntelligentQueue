<?php
    include "configL.php";
    $sql = "SELECT data FROM headfoot where ID = '2';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["data"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>