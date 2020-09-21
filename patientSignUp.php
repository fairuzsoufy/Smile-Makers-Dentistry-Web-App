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



if(isset($_POST['submit']))
{
    
    
	$fullname=$_POST['fullname'];
    $mobilenumber=$_POST['mobile'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $pass=$_POST['password'];   
    $type=1;
    $user_id = -1;
    
        $query="INSERT INTO users (email,password,type) values ('$email', '$pass',$type)";
    if(mysqli_query($conn,$query)){
        $user_id =  $conn->insert_id;
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return;
    }

    $query="INSERT INTO patients (fullname,mobilenumber,`Address`, user_id,age) values ('$fullname','$mobilenumber','$address', $user_id ,'$age')";
    if(mysqli_query($conn,$query)){
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    
}
else{
    require( "patientSignUp.html");
}





?>