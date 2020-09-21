<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "dental_clinic";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    echo("no connection");
    die("Connection failed: " . $conn->connect_error);
} 

   
$sql = "select patients.user_id, patients.fullname,patients.mobilenumber, appointments.date
from patients inner join appointments on patient_id=patients.id" ;


$term =  $_POST['term'];
  echo"<table border=1 width=100%>
            <tr><th>Patient ID</th><th> Full Name</th><th>Mobile Number</th><th>Date</th></tr>";
if(!empty($term)){
    // Attempt select query execution
    $sql = $sql." WHERE patients.user_id LIKE '%" . $term . "%' 
	or patients.fullname LIKE '%" . $term . "%' 
	or patients.mobilenumber LIKE '%" . $term . "%'";
}
//echo $sql;
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>" . $row['user_id'] . "</td><td>". $row['fullname'] ."</td><td>".$row["mobilenumber"]."</td><td>".$row["date"]."</td></tr>";
            }
            
        } else{
            echo "<tr><td colspan=4>No matches found</td></tr>";
        }
    } else{
        echo "<tr><td colspan=4>ERROR: Could not able to execute $sql. " . mysqli_error($conn)."</td></tr>";
    }

 echo"</table>";
// close connection
mysqli_close($conn);


?>