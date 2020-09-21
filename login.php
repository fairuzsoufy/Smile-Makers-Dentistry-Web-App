<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "dental_clinic";
    session_start();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = 'SELECT * from users where email= "'. $_POST["Email"] .'" and password="'.$_POST["Password"].'"';
    $result = mysqli_query($conn,$sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            // echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["type"]. "<br>";
            if($row["type"]==1)
            {
                 $id= $row["id"];
                $_SESSION["ID"]=$id;
               
               
                
                $sql="SELECT id from patients WHERE user_id = ".$_SESSION['ID'];
                $result1 = mysqli_query($conn, $sql);
                
                $rowpatient = $result1->fetch_assoc();
                
               
                $patientId=$rowpatient["id"];
                $_SESSION["PatientId"]=$patientId;
               
                header("Location:patient.php");
                exit();
            }
            elseif($row["type"]==2)
            {
                $_SESSION["ID"]= $row["id"];
                //hwdih 3la doctor
            }
            else 
            {
                $_SESSION["ID"]= $row["id"];
                //hwdih 3la receptionist
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('wrong email or password');</script>";
        require( "login.html");    
    }
    $conn->close();
}
else {
    require( "login.html");
}
?> 