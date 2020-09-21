

<?php
require('html/header.html');
?>

<body>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

  <script>
 
 function test()
 {

    var info = $('#prespTextArea').val();
    alert(info);
    jQuery.ajax({
      url:"patientBackEnd.php",
      type:"POST",
      data:'method=saveImg&info='+info,
      success:function(data2)
        {
          alert("done");
        } 


    });
 }
  function makeInquiry()
  {
    
    jQuery.ajax({
        url: "patientBackEnd.php",
        data: 'method=sendInquiry&Inqury='+$("#inquiryTextArea").val(),
        type: "POST",
        success:function(data2)
        {
          alert("done");
        }          
    });
  }

  function checkResAjax()
  {
    jQuery.ajax(
			{
        url: "patientBackEnd.php",
        data: {method: 'checkRes'},
				type: "GET",
				success:function(data2)
				{
					alert(value);
				}
				        
			});
  }
 
</script>

  <div class="container">
    <div class="gowa">

      <div class="topBar ">
        <button id="bookButton"> Book an Appointment</button> 
        <button id="cancelButton"> Cancel Reservation</button>
        <button id="updateButton"> Update</button>
        <button id="prescreptionButton"> View/Add prescription</button>
        <button id="testsButton"> Upload Tests</button>
        <button id="billButton" onclick="checkResAjax()"> View Bill </button>
        <button id="inquiryButton"> Make Inquiry</button>
        
      </div>
      <div class="restOfForm ">
      <!-- book an appointment #1 -->
        <form id="form1" action="Patient.php" class="allForms">

          <p> Choose the service you want to book</p>
          <select class="form-control col-md-4 offset-4" name="specialty" id="specialty">
            <option></option>
          </select>
          <p> Choose doctors</p>
          <select class="form-control col-md-4 offset-4" name="doctor" id="doctor">
          </select>
          <p> Choose the date</p>
          <input type="text" id="datepicker" name="txtDate">
          
	   <br>
          </select>
          <p> Choose the time</p>
          <select class="form-control col-md-4 offset-4">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
          </select>
          <br>
         
          <br>
          <button class="btn btn-light" type="submit" form="form1" value="Submit">Submit</button>

        </form>

        <!-- Cancel Reservation #2 -->
        <form id="form2" action="" class="allForms">
          <p>Cancel</p>
        </form>


        <!-- Update #3 -->
        <form id="form3" action="" class="allForms">
          <p>Update</p>
        </form>


        <!-- View/add prescription #4 -->
       
        <div id="form4">
          <br><div><input type="file" name="image"></div><br>
          <div><textarea id="prespTextArea" cols="40" rows="4" name="image_text" placeholder="Write Down Your Prescription.."></textarea></div><br>
          <div><button type="submit" class="btn btn-light" name="upload" onclick="test()">Upload</button></div>

        </div>


        <!-- Upload Tests #5 -->
        <form id="form5" action="" class="allForms">
          <p class="presp">Upload a picture of your test</p>
          <input type="file" name="pic" accept="image/*" class="prescrept">
        </form>


        <!-- View Bill #6 -->
      <div id="form6" class="allForms">
      </div>
   

        <!-- Make Inquiry #7-->
        <div id="form7" class="allForms">
        <textarea placeholder="Enter your inquiry.." cols="60" rows="5"  class="textarea" id="inquiryTextArea"></textarea>
        <button class="btn btn-light" Onclick ="makeInquiry()"> Submit </button>

        </div>

      </div>
    </div>
  </div>
  </body>
  <script>

    $(function() {
      jQuery.ajax({
        url: "patientBackEnd.php",
        data: 'method=getSpecitalities',
        type: "GET",
        success:function(Specitalities)
        {
          //convert convert string returned to json array
          var Specs = JSON.parse(Specitalities);
          Specs.forEach(function(item, index) {
            $('#specialty')
              .append($("<option></option>")
                    .attr("value",item.id)
                    .text(item.name)); 
          });
        }          
      });
    });
    //echo '<option value="'.$specialty['id'].'">'.$specialty['name'].'</option>';
    //Form1
    $("#bookButton").click(function () {
      $("#form1").show();
      $("#form2").hide();
      $("#form3").hide();
      $("#form4").hide();
      $("#form5").hide();
      $("#form6").hide();
      $("#form7").hide();
    });
    //Form2
    $("#cancelButton").click(function () {

      $("#form2").show();
      $("#form1").hide();
      $("#form3").hide();
      $("#form4").hide();
      $("#form5").hide();
      $("#form6").hide();
      $("#form7").hide();
    });
    //Form 3
    $("#updateButton").click(function () {

      $("#form3").show();
      $("#form1").hide();
      $("#form2").hide();
      $("#form4").hide();
      $("#form5").hide();
      $("#form6").hide();
      $("#form7").hide();
    });

    //Form 4
    $("#prescreptionButton").click(function () {

      $("#form4").show();
      $("#form1").hide();
      $("#form2").hide();
      $("#form3").hide();
      $("#form5").hide();
      $("#form6").hide();
      $("#form7").hide();
    });

      //Form 5
    $("#testsButton").click(function () {

      $("#form5").show();
      $("#form1").hide();
      $("#form2").hide();
      $("#form3").hide();
      $("#form4").hide();
      $("#form6").hide();
      $("#form7").hide();
    });
      
      //Form 6
    $("#billButton").click(function () {
      $("#form6").show();
      $("#form1").hide();
      $("#form2").hide();
      $("#form3").hide();
      $("#form4").hide();
      $("#form5").hide();
      $("#form7").hide();
    });

      //Form 7
    $("#inquiryButton").click(function () {

      $("#form7").show();
      $("#form1").hide();
      $("#form2").hide();
      $("#form3").hide();
      $("#form4").hide();
      $("#form5").hide();
      $("#form6").hide();
    });
    
    $("#specialty").change(function(){
      $("#doctor option").remove();
      $('#doctor')
        .append($("<option></option>")
              .attr("value",-1)
              .text(''));
      var specialityId = $(this).find("option:selected").val();
      jQuery.ajax({
        url: "patientBackEnd.php",
        data: 'method=getDoctors&specialityId='+specialityId,
        type: "GET",
        success:function(doctorsData)
        {
          //convert convert string returned to json array
          var doctors = JSON.parse(doctorsData);
          doctors.forEach(function(item, index) {
            $('#doctor')
              .append($("<option></option>")
                    .attr("value",item.id)
                    .text(item.fullname)); 
          });
        }          
      });
    });

    $("#doctor").change(function()
    {
      var doctorId = $(this).find("option:selected").val();
      jQuery.ajax({
        url: "patientBackEnd.php",
        data: 'method=getDays&doctorId='+doctorId,
        type: "GET",
        success:function(doctorsDays)
        {
          //convert convert string returned to json array
          var days = JSON.parse(doctorsDays);

          //loop on days and change it to be only array of weekdays
          days = days.map(function(c){return c.weekday});
          
          $( "#datepicker" ).datepicker({
              showOn: "both",
              buttonImage: "images/calendar.gif",
              buttonImageOnly: true,
              buttonText: "Select date",
              maxDate: "+1m",
              minDate: new Date(),
                beforeShowDay: function(d) {
                    var day = d.getDay();
                    return [(days.includes(day.toString()))];
                }
          });
            
        }          
      });

    });
  
  </script>