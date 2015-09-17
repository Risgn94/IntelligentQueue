<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rarepepe";

/*$servername = "mysql38.unoeuro.com";
$username = "rarepepe_org";
$password = "12Darkeldar";
$dbname = "rarepepe_org_db";*/


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/* Create connection
$sql = "SELECT data FROM headfoot where ID = '1';";
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
*/
?>