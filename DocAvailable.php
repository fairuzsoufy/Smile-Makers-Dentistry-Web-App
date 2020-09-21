<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dental_clinic";



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if(isset($_POST['submit']))
{
$saturday=$_POST['saturday'];
$sunday=['sunday'];
$monday=['monday'];
$tuesday=['tuesday'];
$wednesday=['wednesday'];
$thursday=['thursday'];
for($i=0;i<count($saturday);$i++)
{
    $sql="INSERT INTO doctor_availability ()";
}
}

?>