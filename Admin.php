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
$query="SELECT id,name FROM specialties";
$result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>receptionist </title>
    <link rel="icon" href="images/logo.png">
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<link rel="stylesheet" href="newstyle.css">


</head>

<script src="script.js">
</script>

<body>
  <!-- header -->
<div class="container">
    <div class="row">
      <div class="media col-md-2 offset-md-10">
        <a href="https://www.facebook.com">
          <img src="images/fb.png" >
        </a>
        <a href="https://www.twitter.com">
          <img src="images/twitter.png" >
        </a>
        <a href="https://www.instagram.com">
          <img src="images/instagram.png" >
        </a>
       </div>
    </div>
    <div class="row align-items-center row-eq-height">
        <div class=" logo col-md-2">
          <img src="images/logo.png">
        </div>
        <div class="call col-md-4 offset-md-6"> 
          <img src="images/callUs.png" >
        </div> 
    </div>
    <hr style="border: 0.5px dashed #a3dbec"/> 
  
<div class="row">
      <div class="second" > 
        <div class="links">
          <a href="new index.html"> Home </a>
          <a href="new index.html"> Log Out</a>
        </div>
      </div>
    </div>


  
</div>

<div class="container">

<div class="gowa">

<div class="topBar ">
    <button id= "add"> Add Doctor</button>
    <button id= "list"> List all doctors</button>
</div>
<div class="restOfForm form-group Forms">
    
    <form id="adminForm1" action="Admin.php" method="POST">
<div  class ="doctor">
                    
        <select class = "doctor" name="speciality[]" class="selectpicker" multiple data-live-search="true" require> 
          <option class="doctor"  value=""></option>
          <?php
            while($row=$result->fetch_assoc())
            {
              echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
          ?>

      </select>
      <br>
     
      <input class="doctor" name ="fullname"type="text" placeholder="Full Name" required/>
      <input class="doctor" name="mobile"type="text" placeholder="Mobile Number" required/>
<br>
      <input class="doctor" name="address"type="text" placeholder="Address" required/>
      <input class="doctor" name="national" type="text" placeholder="National ID" required/>
      <br>
      <input class="doctor" name="title"type="text" placeholder="title" required/> 
      <br>
      <input class="doctor" name="email" type="email" placeholder="Email Address" required/>
      <input class="doctor" name="password" type="password" placeholder="*******" required/>
      <br>
        </div>
      <p> Time plan </p>
      
<div class="TimePlan container-fluid">
    <div class ="row">
<div class="checkbox offset-md-3 col-md-2 ">

<label class="label"> <input name="check_list[]" value="monday" type="checkbox" id="weekday-mon" class="weekday" />Monday</label>
        </div>
  
  <input type="time" id="mondayfrom" name="time_from_monday" class ="from"
       min="10:00" max="23:00" disabled="disabled" step="3600"> to
       <input type="time" id="mondayto" name="time_to_monday"
       min="11:00" max="24:00" disabled="disabled" step="3600"  class ="to">
        </div>
  <br>
  <div class ="row">
  <div class="checkbox offset-md-3 col-md-2 ">
  <label class=" label"><input name="check_list[]" value="tuesday" type="checkbox" id="weekday-tue" class="weekday" />Tuesday</label>
        </div>
  
  <input type="time" id="tuesdayfrom" name="time_from_tuesday"
       min="10:00" max="23:00" disabled="disabled" step="3600" class ="from"> to
       <input type="time" id="tuesdayto" name="time_to_tuesday"
       min="11:00" max="24:00" disabled="disabled" step="3600" class ="to" >
        </div>
          <br>

  <div class= "row" >
     
  <div class="checkbox offset-md-3 col-md-2 ">
  <label class="label"><input name="check_list[]" value="wednesday" type="checkbox" id="weekday-wed" class="weekday" />Wednesday</label>
        </div>
 
  <input type="time" id="wednesdayfrom" name="time_from_wednesday"
       min="10:00" max="23:00" disabled="disabled" step="3600"class ="from"> to
       <input type="time" id="wednesdayto" name="time_to_wednesday"
       min="11:00" max="24:00" disabled="disabled" step="3600"  class ="to" >
        </div>
     
        <br>




        <div class= "row" >  
  <div class="checkbox offset-md-3 col-md-2 ">
  <label class="label"><input name="check_list[]" type="checkbox" value="thursday" id="weekday-thu" class="weekday" />Thursday</label>
        </div>
  <input type="time" id="thursdayfrom" name="time_from_thursday"
       min="10:00" max="23:00" disabled="disabled" step="3600"  class ="from"> to
       <input type="time" id="thursdayto" name="time_to_thursday"
       min="11:00" max="24:00" disabled="disabled" step="3600"   class ="to">
        </div>
  <br>
  <div class= "row" >
  <div class="checkbox offset-md-3 col-md-2 ">
  <label class="label"> <input name="check_list[]" type="checkbox" value="saturday" id="weekday-sat" class="weekday" />Saturday</label>
        </div>
  <input type="time" id="saturdayfrom" name="time_from_saturday"
       min="10:00" max="23:00" disabled="disabled" step="3600"  class ="from"> to
       <input type="time" id="saturdayto" name="time_to_saturday"
       min="11:00" max="24:00" disabled="disabled" step="3600"  class ="to" >
  
        </div>
        <br>
        <div class= "row" >
        <div class="checkbox offset-md-3 col-md-2">
  <label class="label"><input name="check_list[]"type="checkbox" value="sunday" id="weekday-sun" class="weekday" />Sunday</label>
        </div>
  <input type="time" id="sundayfrom" name="time_from_sunday"
       min="10:00" max="23:00" disabled="disabled" step="3600"  class ="from"> to
       <input type="time" id="sundayto" name="time_to_sunday"
       min="11:00" max="24:00" disabled="disabled" step="3600"  class ="to" >
        </div>

          
<button  class="btn btn-light" type="submit" name="submit">Add Doctor</button> <br><br>
  </form>
</div>
</div>
</div>

</div>
</body>
</html>
<!-- add doctor php -->
<?php
                        if(isset($_POST['submit']))
                        {
                         
                            $specarr=$_POST['speciality'];
                            $fullname=$_POST['fullname'];
                            $mobilenumber=$_POST['mobile'];
                            $address=$_POST['address'];
                            $nationalid=$_POST['national'];
                            $email=$_POST['email'];
                            $pass=$_POST['password'];   
                            $title=$_POST['title'];

                            $query="SELECT COUNT(email) 'count' FROM users WHERE email='$email'";
                            $result = mysqli_query($conn,$query);
                            $row=$result->fetch_assoc();
                            if($row['count']>0)
                            {
                                echo"this email is already taken please enter another one";
                            }
                            else {

                                $type=2;
                                $user_id = -1;
                            
                                $query="INSERT INTO users (email,password,type) values ('$email', '$pass',$type)";
                            if(mysqli_query($conn,$query)){
                                $user_id =  $conn->insert_id;
                                // echo "New record created successfully";
                            } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                return;
                            }
                            $doctor_id=-1;
                            $query="INSERT INTO doctors (fullname,mobilenumber,address, user_id,national_id,title) 
                            values ('$fullname','$mobilenumber','$address', $user_id,$nationalid,'$title')";
                            if(mysqli_query($conn,$query))
                            {
                              $doctor_id =  $conn->insert_id;
                                // echo "New record created successfully";
                            } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($conn);
                            }
                            
                            
                            for($i=0;$i<count($specarr);$i++)
                            {
                              $query="INSERT INTO doctor_speciality (doctor_id,speciality_id) values ($doctor_id,$specarr[$i])";
                              if(mysqli_query($conn,$query)){
                                  // echo "New record created successfully";
                              } else {
                                  echo "Error: " . $query . "<br>" . mysqli_error($conn);
                              }

                            }

                            if(!empty($_POST['check_list']))
                            {    
                                // Loop to store and display values of individual checked checkbox.
                                    //print_r($_POST['check_list']);
                                foreach($_POST['check_list'] as $selected)
                                {
                                    $fromTime = explode(":", $_POST['time_from_'.$selected])[0];
                                    $toTime = explode(":",$_POST['time_to_'.$selected])[0];

                                    for($i=$fromTime;$i<$toTime;$i++)
                                    {
                                        $query="INSERT INTO doctor_availability (doctor_id,weekday,hour_value) values ($doctor_id,'$selected',$i)";
                                        $result = mysqli_query($conn,$query);
                                        
                                    }
                                   
                                }
                                
                            }
                            else{
                                echo "<b>Please Select Atleast One Option.</b>";
                            }
                        }
                            mysqli_close($conn);

                            //Redirect to List Doctors YA SARA
                            
                        }
?>


<script>
    $("#add").click(function(){
        $("#adminForm1").show();
       
    });
    $('select').selectpicker();

$('#weekday-mon').change(function(){
   $("#mondayfrom").prop("disabled", !$(this).is(':checked'));
   $("#mondayto").prop("disabled", !$(this).is(':checked'));
});
$('#weekday-tue').change(function(){
   $("#tuesdayfrom").prop("disabled", !$(this).is(':checked'));
   $("#tuesdayto").prop("disabled", !$(this).is(':checked'));
});
$('#weekday-wed').change(function(){
   $("#wednesdayfrom").prop("disabled", !$(this).is(':checked'));
   $("#wednesdayto").prop("disabled", !$(this).is(':checked'));
});
$('#weekday-thu').change(function(){
   $("#thursdayfrom").prop("disabled", !$(this).is(':checked'));
   $("#thursdayto").prop("disabled", !$(this).is(':checked'));
});
$('#weekday-sat').change(function(){
   $("#saturdayfrom").prop("disabled", !$(this).is(':checked'));
   $("#saturdayto").prop("disabled", !$(this).is(':checked'));
});
$('#weekday-sun').change(function(){
   $("#sundayfrom").prop("disabled", !$(this).is(':checked'));
   $("#sundayto").prop("disabled", !$(this).is(':checked'));
});
  
    </script>