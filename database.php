<?php
$servername = "localhost";
$username = "root";
$password = "vul3aup6";
$dbname = "oldpeople";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn,"SET NAMES 'utf8'");
?>
