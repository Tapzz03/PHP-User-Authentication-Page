<?php
$servername = ""; // Enter servername, usually 'localhost'.
$username = ""; //Enter username, usually 'root'
$password = ""; //Enter password, usually leave it empty as there is no password set on localhost.
$dbname = ""; //Enter the database name you created. 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>