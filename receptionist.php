<?php

require('html/header.html');

?>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script>
  function saveReply(btn) {

    var inquiryId = $($(btn).siblings('textarea')[0]).attr('data-id');
    var reply = $($(btn).siblings('textarea')[0]).val();


    jQuery.ajax(
			{
        url: "receptionistBackEnd.php",
        data: 'method=saveInquiryReply&inquiryId='+inquiryId+'&reply='+reply,
				type: "POST",
				success:function(data2)
				{
					unreadAjax();
				}
				        
			});


  }
  function unreadAjax()

  {
    
			jQuery.ajax(
			{
        url: "receptionistBackEnd.php",
        data: {method: 'unread'},
				type: "GET",
				success:function(data2)
				{
					$("#inquiry_result").html(data2);
				}
				        
			});
  }
  function readAjax()
  {
    
			jQuery.ajax(
			{
        url: "receptionistBackEnd.php",
        data: {method: 'read'},
				type: "GET",
				success:function(data2)
				{
					$("#inquiry_result").html(data2);
				}
				        
			});
  }
  function getResult() 
		{
			jQuery.ajax(
			{
        url: "receptionistBackEnd.php",
				data:'method=search&term='+$("#term").val(),
				type: "POST",
				success:function(data2)
				{
					$("#result").html(data2);
				}
				        
			});
		}
</script>


  <div class="container">

    <div class="gowa">

      <div class="topBar ">
      <button id="docSch"> Doctor's Schedule</button>
      <button id="patApp"> Patients Appointments</button>
      <button id="inquiryRecep"> Inquires</button>
      <button id="billRecep"> Bills</button>
        
      </div>
      <div class="restOfForm ">

      <!-- Doctor Schedule Rec1 -->

        <form id="Rec1" class="allForms">
        <p> doc sch </p>
        </form>

        <!-- Patients Appointments Rec2 -->

        <form id="Rec2" class="allForms">
        <input name="term" type="text" id="term" onkeyup="getResult()" placeholder="Search" />
        <div id="result"></div>

        </form>

        <!-- Inquires Rec3 -->
        <div id="Rec3" class="allForms">
          <div class="middle">
        <button class="btn btn-light twoButt" onclick="unreadAjax()"> Unread Inquires </button>
        <button class="btn btn-light twoButt" onclick="readAjax()"> Replied Inquires </button>
  </div>
        <div class="container-fluid">
          <div id="inquiry_result" class="row"></div>
        </div>
        
        </div>

        <!-- Bills Rec4 -->
        <form id="Rec4" action="" class="allForms">

        <p> bill </p>

        </form>

        




      </div>
    </div>

  </div>
  <script>
    $("#docSch").click(function () {
      $("#Rec1").show();
      $("#Rec2").hide();
      $("#Rec3").hide();
      $("#Rec4").hide();

    });

    $("#patApp").click(function () {

      $("#Rec1").hide();
      $("#Rec2").show();
      $("#Rec3").hide();
      $("#Rec4").hide();
    });

    $("#inquiryRecep").click(function () {

      $("#Rec1").hide();
      $("#Rec2").hide();
      $("#Rec3").show();
      $("#Rec4").hide();
    });

    $("#billRecep").click(function () {

      $("#Rec1").hide();
      $("#Rec2").hide();
      $("#Rec3").hide();
      $("#Rec4").show();
      });
    $("#specialty").change(function(){
      $("#doctor option").hide();
      var selectedText = $(this).find("option:selected").text();
      $("#doctor option[specialties*='"+ selectedText +"']").show();
    });


    
  </script>

