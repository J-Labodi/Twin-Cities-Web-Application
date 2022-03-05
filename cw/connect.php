<?php
//All the necessary values for connecting to the database
$servername = "localhost";
$username = "root";
$password = "Becher01!";
$dbname = "dsa_twincities";
// Create connection using the values provided
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection 
/*
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
echo "connected succesfully";  
*/
?>