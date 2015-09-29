<?php
$string = file_get_contents("Configuration/ConfigFile.json");
$json_a = json_decode($string, true);
//Get server info from config File json
$servername = $json_a['serverName'];
$username = $json_a['userName'];
$password = $json_a['password'];
$dbname = $json_a['dbName'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>