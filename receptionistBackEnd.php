<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "dental_clinic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// echo isset($_POST);
//print_r($_POST);
if(isset($_POST['method']) && $_POST['method']=="search")
{
    search($conn);
}
else if(isset($_POST['method']) && $_POST['method']=="saveInquiryReply")
{
    saveInquiryReply($conn);
}
else if($_GET['method']=="unread")
{
    unread($conn);
}

else
{
    read($conn);
}


function read($conn){

    $sql = "SELECT * FROM `inquiry` WHERE status=1";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

            echo"<div style='padding-bottom:100px; border-radius:10px; border:2px solid navy; margin-bottom:20px; margin-right:20px; margin-left:40px;' class='col-md-2'>INQUIRY #" . $row['inquiry_id'] . " <br /> Message: ". $row['message'] ."<br />"
            ."Reply: " . $row['reply']."</div>";
        
        }
    }
}

function unread($conn)
{

    
  $sql = "SELECT * FROM `inquiry` WHERE status=0";
  $result = mysqli_query($conn,$sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
      {
        echo"<div style='padding-bottom:2px;' class='col-md-3'>INQUIRY #" . $row['inquiry_id'] . " <br /> Message: ". $row['message'] ."<br />
        <textarea data-id='".$row['inquiry_id']."' ></textarea><br/><button onclick='saveReply(this)'>save</button></div>";
        
      }
  }
  else
        {
            echo "<div style='font-size:25px; color: navy;' class='offset-md-5 col-md-3'>No inquires yet </div>";
        }


}

function saveInquiryReply($conn)
{
    $reply=$_POST['reply'];
    $inquiryId=$_POST['inquiryId'];

    $sql="UPDATE inquiry SET reply = '".$_POST['reply']."', status=1 WHERE inquiry.inquiry_id =".$_POST['inquiryId'];

    $result = mysqli_query($conn,$sql);

}

function search($conn)
{

    $sql = "select patients.user_id, patients.fullname,patients.mobilenumber, appointments.date from patients inner join appointments on patient_id=patients.id" ;
    $term =  $_POST['term'];
    echo"<table border=1 width=100%><tr><th>Patient ID</th><th> Full Name</th><th>Mobile Number</th><th>Date</th></tr>";
    if(!empty($term))
    {
        // Attempt select query execution
        $sql = $sql." WHERE patients.user_id LIKE '%" . $term . "%' or patients.fullname LIKE '%" . $term . "%' or patients.mobilenumber LIKE '%" . $term . "%'";
    }
    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr><td>" . $row['user_id'] . "</td><td>". $row['fullname'] ."</td><td>".$row["mobilenumber"]."</td><td>".$row["date"]."</td></tr>";
            }
            
        } 
        else
        {
            echo "<tr><td colspan=4>No matches found</td></tr>";
        }
    }
    else
    {
        echo "<tr><td colspan=4>ERROR: Could not able to execute $sql. " . mysqli_error($conn)."</td></tr>";
    }

}

?>