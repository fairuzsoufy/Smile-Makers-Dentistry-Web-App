<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "dental_clinic";
session_start();
$patientId = $_SESSION["PatientId"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 





if(isset($_POST['method']) && $_POST['method']=="sendInquiry")
{
    sendInquiry($conn,$patientId);
}
else if (isset($_POST['upload'])) {
    $msg = "";
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

    // image file directory
    $target = "images/".basename($image);

    $sql = "INSERT INTO prescription (patient_id, doctor_id,caption) VALUES(12,22,'$image_text')";
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
else if(isset($_GET['method']) && $_GET['method']=="getSpecitalities")
{
    getSpecitalities($conn);
}
else if(isset($_GET['method']) && $_GET['method']=="getDoctors")
{
    getDoctors($conn);
}
else if(isset($_GET['method']) && $_GET['method']=="getDays")
{
    getDays($conn);
}
else if($_GET['method']=="checkRes")
{
   checkRes($conn,$patientId);
}



function sendInquiry($conn,$patientId)
{
    session_start();
    $message =$_POST['Inqury'];
    print_r( $_SESSION);
    $sql = "INSERT INTO inquiry (message, reply, patient_id) VALUES ('$message', '',$patientId)";
    echo $sql;
    $result= mysqli_query($conn,$sql);
 

}

function getDoctors($conn) {
    $specialityId = $_GET['specialityId'];
    $doctors = array();
    $sql = "SELECT doctors.id, fullname FROM `doctors` JOIN doctor_speciality on doctor_speciality.doctor_id = doctors.id  WHERE doctor_speciality.speciality_id = ".$specialityId;
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($doctors, $row);
        }
    }
    //convert php array to json array and print it as string
    echo json_encode($doctors);
}

function getSpecitalities($conn) {
    $specialties = array();
    $sql = "SELECT * from specialties";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            array_push($specialties, $row);
        }
    }
    echo json_encode($specialties);
}
function getDays($conn)
{
    $doctorId = $_GET['doctorId'];
    $days = array();
    $sql = "SELECT DISTINCT weekday from doctor_availability where doctor_availability.doctor_id=".$doctorId;
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            array_push($days, $row);
        }
    }
    echo json_encode($days);
}

function checkRes($conn,$patientId)
{
    echo("yyyyyyy");
    $sql='SELECT * from appointments where patient_id=$patientId';
    $sql2='SELECT status from appointments where patient_id=$patientId';

    $result = mysqli_query($conn,$sql);
    $result2= mysqli_query($conn,$sql2);

        if ($result->num_rows > 0  && $result2 ==1) 
        {
            while($row = $result->fetch_assoc())
            {
              //  yetl3 fatora
            }
        }
        else if($result->num_rows > 0 && $result2 ==0 )
        {
            $message = "not confirmed";
            echo "$message";
        }
        else 
        {
            $message = "has no appointement";
            echo "$message";
        }
        
        
}

function saveImg($conn)
{
    $recievedInfo = $_POST['info'];
    $sql="INSERT INTO prescription (patient_id, doctor_id,caption) VALUES(12,22,'$recievedInfo')";
    $result = mysqli_query($conn,$sql);
    echo ($sql);
    print_r($result);

}
?>