<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dental_clinic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = 'SELECT * from  where email= "'. $_POST["Email"] .'" and password="'.$_POST["Password"].'"';
$result = $conn->query($sql);

















$conn->close();
?>