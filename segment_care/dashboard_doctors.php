<?php
//error_reporting(0);
session_start();
include ('authenticate.php');

$userid_sess =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$token_sess =   htmlentities(htmlentities($_SESSION['token'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));
$profession = strip_tags($_SESSION['profession']);
$role = strip_tags($_SESSION['role']);





if($role != 'Staff'){
echo "<script>
alert('Only Doctors can access this Page');
window.setTimeout(function() {
  window.location.href = 'index.php';
}, 1000);
</script>";


exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
 
<title>Welcome <?php echo htmlentities(htmlentities($fullname_sess, ENT_QUOTES, "UTF-8")); ?> to Segment Care Appointment Booking System </title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="landing page, website design" />
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="scripts/bootstrap.min.css">

<link type="text/css" rel="stylesheet" href="scripts/storex.css">

  <script src="scripts/jquery.dataTables.min.js"></script>
  <script src="scripts/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="scripts/dataTables.bootstrap.min.css" />
<script src="scripts/moment.js"></script>
<script src="scripts/livestamp.js"></script>


<script>



window.addEventListener('load', function(e) {
    if (navigator.onLine) {
$('#network_status').html("<br><br><div style='color:white;background:green;padding:10px;border:none;'>Your network status is Online </div>");

    } else {
$('#network_status').html("<br><br><div style='color:white;background:red;padding:10px;border:none;'>Your network status is Offline. Please Ensure You are Online to use this app... </div>");

    }
}, false);



window.addEventListener('online', function(e) {
$('#network_status').html("<br><br><div style='color:white;background:green;padding:10px;border:none;'>Your are back is Online </div>");

}, false);
            
window.addEventListener('offline', function(e) {
$('#network_status').html("<br><br><div style='color:white;background:red;padding:10px;border:none;'>Your Internet Connection is Down </div>");

}, false);


   </script>



</head>
<body>



<div class="text-center">
<nav class="navbar navbar-fixed-top style='background:purple' ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">

      <ul class="nav navbar-nav navbar-right">

<li class="navgate" style='display:none'>

<button data-toggle="modal" data-target="#myModal_vault" class="invite_btnx btn btn-warning" title='Book Medical Appointments'>Book Appointments </button>

</li>

<li style='' class="navgate">

<button class="invite_btnx btn btn-warning"><a style="color:white;" href='statistics_appointments.php' title='Appointments Statistics'>Appointments Statistics</a></button>

</li>

<li class="navgate">

<button class="invite_btnx btn btn-warning"><a style="color:white;" href='logout.php' title='Logout'>Logout</a></button>

</li>
</ul>





    </div>
  </div>


</nav>


    </div><br />
<br /><br />


<br />
<div style='width:100vw; height: 100vh;  min-height:600px;'>
 

<div class='row'>
<div class='col-sm-1'></div>

<div class='col-sm-11'>
<div id="network_status"></div><br>
<h4>Welcome Medical Staff/Doctor: <?php echo $fullname_sess; ?> </h4>
</div>

</div>





<style>
.report_cssx{
background:#ddd;
padding:10px;
height:70px;
border:none;
color:black;
border-radius:20%;
font-size:16px;
text-align:center;


}


.report_cssx:hover{
background:orange;
color:black;

}

</style>




<?php
include('./backend/data6rst.php');


$result = $db->prepare("SELECT * FROM appointments");
$result->execute(array());
$rows = $result->fetch();
$counting_result = $result->rowCount();




$resultc = $db->prepare("SELECT * FROM appointments where status='Open' ");
$resultc->execute(array());
$rowsc = $resultc->fetch();
$counting_open = $resultc->rowCount();




$resultc = $db->prepare("SELECT * FROM appointments where status='Closed' ");
$resultc->execute(array());
$rowsc = $resultc->fetch();
$counting_closedx = $resultc->rowCount();
?>
<div class='row'>

<div class='col-sm-4 report_cssx'>
<b style='font-size:20px'>
(<?php echo $counting_result; ?>) </b><br>
Total Medical Appointments Booked So far.

</div>


<div class='col-sm-4 report_cssx'>
<b style='font-size:20px'>
(<?php echo $counting_open; ?>)  </b><br>
Total Medical Appointments Awaiting Doctors Approval.



</div>

<div class='col-sm-4 report_cssx'>
<b style='font-size:20px'>
(<?php echo $counting_closedx; ?>) </b><br>
Total Medical Appointments Completed in Life Time

</div>


</div><br>

<b>Search Medical Appointments by Fullname, Email, Status etc...</b><br><br>





<div class="container">
<div class="row">
<div class="col-sm-12 table-responsive">
<div class="alert_server_response"></div>
<div class="loader_x"></div>
<table id="bc" class="table table-bordered table-striped">
<thead><tr>
<th>Patients Fullname</th>

<th>Patients Medical Appointments Details</th>
<th>Appointment Date</th>
<th>Appointment Time</th>
<th>Appointment Status</th>
<th>TimeAgo</th>
<th>Actions</th>
</tr></thead>
</table>
</div>
</div>
</div>








<span class="alert_server_response"></span>
<span class="loader_x"></span>



<script>
$(document).ready(function(){
//$('.btn_call').click(function(){
$(document).on( 'click', '.btn_call', function(){ 

var id = $(this).data('id');
var userid = $(this).data('userid');
var services_title = $(this).data('services_title');
var email = $(this).data('email');
var fullname = $(this).data('fullname');
var status  = $(this).data('status');

var diagnosis  = $(this).data('diagnosis');
var medication= $(this).data('medication');
var content= $(this).data('content');

//alert(diagnosis);
//alert(medication);

$('.p_id').html(id);
$('.p_userid').html(userid);
$('.p_services_title').html(services_title);
$('.p_email').html(email);
$('.p_fullname').html(fullname);
$('.p_status').html(status);
$('.p_content').html(content);

$('.p_identity_value').val(id).value;
$('.p_email_value').val(email).value;
$('.p_fullname_value').val(fullname).value;
$('.p_services_title_value').val(services_title).value;
$('.p_userid_value').val(userid).value;

$('.p_diagnosis_value').val(diagnosis).value;
$('.p_medication_value').val(medication).value;


//starts

if(fullname==''){
alert('Patients Fullname cannot be empty');
//return false;
}
 else if(email==''){
alert('Patients Email cannot be empty');
}
else if(status==''){
alert('Patients Email Cannot be Empty.');
}

else{
$('#loader_xx').fadeIn(400).html('<br><br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif">Updating Twilio Segment about your View...</div>')

var datasend = {fullname:fullname,email:email,status:status,services_title:services_title};	
		$.ajax({
			type:'POST',
			url:'./backend/patients_record_viewers_segments.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){		
$('#loader_xx').hide();
$('#result_xx').html(msg);
setTimeout(function(){ $('#result_xx').html(''); }, 5000);
//location.reload();
		
	}
			
		});
		
		}

//ends






});

});





// clear Modal div content on modal closef closed
$(document).ready(function(){

$("#myModal_carto").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty').empty(); 
$('#q').val(''); 
});



$("#myModal_med").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty1').empty(); 
//$('#q').val(''); 
});





$("#myModal_diagnosis").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty2').empty(); 
//$('#q').val(''); 
});



$("#myModal_medication").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty3').empty(); 
//$('#q').val(''); 
});




});


</script>




<script>


   $(document).ready(function(){
//$(".reloadData").click(function(){
$(document).on( 'click', '.reloadData', function(){ 

location.reload();

});

});





$(document).ready(function(){

//$('.updates_btn').click(function(){
$(document).on( 'click', '.updates_btn', function(){ 

// confirm start
if(confirm("Are you sure you want to Mark this Appointments as Approved")){
var id = $(this).data('id');


$(".loader-updates_"+id).fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif"> &nbsp;Please Wait, Appointment Status is being Updated...</div>');
var datasend = {'id': id};
		$.ajax({
			
			type:'POST',
			url:'./backend/appointments_status_updates.php',
			data:datasend,
                         dataType: 'json',
                        crossDomain: true,
			cache:false,
			success:function(msg){

var status = msg['status'];
var message = msg['message'];
//alert(status);
//alert(message);



	if(message == 1){

//$(".loader-updates_"+id).hide();
//$(".result-updates_"+id).html("<div style='width: 90px;color:white;background:green;padding:10px;'>Updates  Successfully</div>");
//setTimeout(function(){ $(".result-updates_"+id).html(''); }, 5000);
//location.reload();

alert('Updates Successful');
$("#status_"+id).text(status);
$("#status1_"+id).text('Accepted');
$(".statuscolor_"+id).text('green_css');

$(".stx_"+id).html("<div style='width: 90px;font-size:12px;color:white;background:green;padding:6px;border:none;border-radius:15%;text-align:center;'>Accepted</div>");

$("#statushide_"+id).hide();
$("#statushide2_"+id).hide();

$(".loader-updates_"+id).hide();

}



}
			
});


}

// confirm ends

                });


            });





//Delete

$(document).ready(function(){

//$('.delete_btnx').click(function(){
$(document).on( 'click', '.delete_btnx', function(){ 

// confirm start
if(confirm("Are you sure you want to Delete this Medical Data ... ")){
var id = $(this).data('id');


$(".loader-delete_"+id).fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif"> &nbsp;Please Wait,Medical Data  is being Deleted...</div>');
var datasend = {'id': id};
		$.ajax({
			
			type:'POST',
			url:'./backend/appointment_delete.php',
			data:datasend,
                         dataType: 'json',
                        crossDomain: true,
			cache:false,
			success:function(msg){
//alert(msg.status );
if(msg.status == 0){
alert(msg.message);
$(".loader-delete_"+id).hide();
$(".result-delete_"+id).html("<div style='color:white;background:red;padding:10px;'>" +msg.message+ "</div>");
setTimeout(function(){ $(".result-delete_"+id).html(''); }, 5000);

}



	if(msg.status == 1){
alert(msg.message);
$(".loader-delete_"+id).hide();
$(".result-delete_"+id).html("<div style='color:white;background:green;padding:10px;'>" +msg.message+ "</div>");
setTimeout(function(){ $(".result-delete_"+id).html(''); }, 5000);
//location.reload();
window.setTimeout(function() {
location.reload();
}, 6000);


$(".rec_"+id).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");

}


}
			
});
}

// confirm ends

                });


            });

</script>




<script>
$(document).ready(function(){
//$('.btn_call_update').click(function(){
$(document).on( 'click', '.btn_call_update', function(){ 

var id = $(this).data('id');


//starts

if(id==''){
alert('Id  cannot be empty');
//return false;
}


else{
$('#loader_xy').fadeIn(400).html('<br><br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif">Updating Twilio Segment about your Approval...</div>')

var datasend = {id:id};	
		$.ajax({
			type:'POST',
			url:'./backend/appointments_status_updates_segment.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){		
$('#loader_xy').hide();
$('#result_xy').html(msg);
setTimeout(function(){ $('#result_xy').html(''); }, 5000);
//location.reload();
		
	}
			
		});
		
		}

//ends

});

});




$(document).ready(function(){
//$('.btn_call_delete').click(function(){
$(document).on( 'click', '.btn_call_delete', function(){ 

var id = $(this).data('id');


//starts

if(id==''){
alert('Id  cannot be empty');
//return false;
}


else{
$('#loader_sy').fadeIn(400).html('<br><br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif">Updating Twilio Segment about Patients Data deleting...</div>')

var datasend = {id:id};	
		$.ajax({
			type:'POST',
			url:'./backend/appointments_delete_segment.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){		
$('#loader_sy').hide();
$('#result_sy').html(msg);
setTimeout(function(){ $('#result_sy').html(''); }, 5000);
//location.reload();
		
	}
			
		});
		
		}

//ends

});

});

</script>


<style>
.full-screen-modal {
    width: 80%;
    height: 80%;
    margin: 0;
    top: 0;
    left: 0;
}



.red_css {
    background:red;
    color: white;
    padding: 6px;
border:none;
border-radius:15%;
text-align:center;
font-size:12px;
}

.green_css {
    background:green;
    color: white;
    padding: 6px;
border:none;
border-radius:15%;
text-align:center;
font-size:12px;
width: 90px;
}

.purple_css {
    background:purple;
    color: white;
    padding: 6px;
border:none;
border-radius:15%;
text-align:center;
font-size:12px;
width: 90px;
}

.fuchsia_css {
    background:fuchsia;
    color: white;
    padding: 6px;
border:none;
border-radius:15%;
text-align:center;
font-size:12px;
width: 90px;
}


.c_css{
background: navy;
color:white;
padding:6px;
cursor:pointer;
border:none;
font-size:12px;
//border-radius:25%;
//font-size:16px;
}

.c_css:hover{
background: black;
color:white;

}



</style>






<script>
$(document).ready(function(){

var get_content = 'get_data';
var backup_type = 'g';
if(get_content=="" && backup_type==""){
alert('There is an Issue with Cotent Database Retrieval');
}
else{
$('.loader_x').fadeIn(400).html('<br><div style="background:#ccc;color:black; width:100%;height:30%;text-align:center"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being Loaded</div>');
		
 var bck = $('#bc').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"./backend/appointments_action_doctors.php",
   type:"POST",
   data:{get_content:get_content, backup_type:backup_type}
  },
  "columnDefs":[
   {
    "orderable":false,
   },
  ],
  "pageLength": 10
 });

if(bck !=''){
$('.loader_x').hide();
}

}

 
});
</script>












<hr style="margin-top:1.5em">
<div style="text-align:center"><a href="#">.</a></div>


<div class='row'>


<div id="loader_vault"></div>
<div id="result_vault"></div>


</div>




</div>




<div id='result_xy'></div>
<div id='result_sy'></div>


<input type="hidden" class="p_identity_value pidx"  value="">

<input type="hidden" class="p_userid_value"  value="">

<input type="hidden" class="p_diagnosis_value"  value="">
<input type="hidden" class="p_medication_value"  value="">


 <!-- Med  Modal  starts-->
  <div class="modal fade" id="myModal_med" role="dialog">
    <div class="modal-dialog  modal-appear-center1">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:purple;color:white;padding:6px;border:none;'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Patients Medical Appointments</h4>
        </div>
        <div class="modal-body">





<div class='row'>
<div class='col-sm-12' style='background:#ddd;'>

<h4>Patients Medical Info</h4>


<div id='loader_xx'></div>
<div id='result_xx'></div>

<b>Name: </b><span class='p_fullname'></span><br>
<b>Email: </b><span class='p_email'></span><br>
<b>Medical Appointment Services: </b><span class='p_services_title'></span><br>
<b>Medical Appointment Details: </b><span class='p_content'></span><br>



               </div>


</div>


<br>





     </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<!-- The Modal Med Pangea Vaults Ends -->








<script>


// Books Appointments 


$(document).ready(function(){
$('#p_btn').click(function(){
//$(document).on( 'click', '.p_btn', function(){ 
		
var desc  =         $('#desc').val();
var title =  $(".title:checked").val();
var p_date  =  $('#p_date').val();
var p_time = $(".p_time:checked").val();


if(title==undefined){
alert('Please Select Medical Appointment Services');
//return false;
}


else if(desc==''){
alert('Please Enter Appointment Details');
//return false;
}




 else if(p_date==''){
alert('please Select Appointment date.');
}



 else if(p_time==undefined){
alert('please Select Appointment Time.');
}


else{
$('#loader_v').fadeIn(400).html('<br><br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif"> Please Wait! .Bookings is being created. MedicalInfo being Store in Pangea Vaults...</div>')



var datasend = {p_date:p_date, p_time:p_time, title:title, desc:desc};	
		$.ajax({
			
			type:'POST',
			url:'./backend/book_appointments_segment.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
 		
$('#loader_v').hide();
$('#result_v').html(msg);
//setTimeout(function(){ $('#result_v').html(''); }, 9000);

$('#desc').val('');
$(".title:checked").val('');
$('#p_date').val('');
$(".p_time:checked").val();
//location.reload();
		

	}
			
		});
		
		}
	
	})
					
});



</script>

<!-- Vault  Modal start -->



<div id="myModal_vault" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: #008080;color:white;padding:10px;'>
        <h4 class="modal-title">Medical Appointment Booking System</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


Easily Book Medical Appointments and have Your Data Secures and Protected in <b>Pangea</b> highly secured Vaults System.<br><br>





        <div class="well">
    		<label>Medical Services</label><br>

<div class='col-sm-4 time_css'>
<input type="radio" id="title" name="title" value="Dental Care" class="title"/>Dental Care <br>
</div>


<div class='col-sm-4 time_css'>
<input type="radio" id="title" name="title" value="Eye Care" class="title"/>Eye Care <br>
</div>




<div class='col-sm-4 time_css'>
<input type="radio" id="title" name="title" value="Gynaecological Care" class="title"/>Gynaecological Care <br>
</div>


<div class='col-sm-4 time_css'>
<input type="radio" id="title" name="title" value="Paediatric Care" class="title"/>Paediatric Care <br>
</div>



<div class='col-sm-4 time_css'>
<input type="radio" id="title" name="title" value="Occulist Care" class="title"/>Occulist Care <br>
</div>


<div class='col-sm-4 time_css'>
<input type="radio" id="title" name="title" value="Lab Services" class="title"/>Lab Services<br>
</div>


</div>

<br>



 <div class="form-group">
              <label>Reasons for Appointments(Medical Details) </label>
              <textarea class="col-sm-12 form-control" cols="3" rows="3" id="desc" name="desc" placeholder="Reasons for Appointments(Medical Details)"></textarea>
            </div>
<br>




 <div class="form-group">
              <label>Appointment Date</label>
              <input type="date" class="col-sm-12 form-control" id="p_date" name="p_date" placeholder="Select Date">
            </div>
<br>





<style>
.time_css{
background:#ccc;padding:6px;border-radius:20%;
}

.time_css:hover{
background:orange;color:black;
}



</style>



    	


        <div role="" class="well">
    		<p><label>Appointment Time</label><br>


<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="10:00:00_10:00 AM" class="p_time"/>10:00 AM <br>
</div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="10:30:00_10:30 AM" class="p_time"/>10:30 AM <br>
</div>
<div class='col-sm-3 time_css'>
 <input type="radio" id="p_time" name="p_time" value="11:00:00_11:00 AM" class="p_time"/>11:00 AM <br>   
</div>

<div class='col-sm-3 time_css'>
 <input type="radio" id="p_time" name="p_time" value="11:30:00_11:30 AM" class="p_time"/>11:30 AM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="12:00:00_12:00 PM" class="p_time"/>12:00 PM <br> </div>
<div class='col-sm-3 time_css'> 
<input type="radio" id="p_time" name="p_time" value="12:30:00_12:30 PM" class="p_time"/>12:30 PM <br></div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="13:00:00_1:00 PM" class="p_time"/>1:00 PM <br>  </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="13:30:00_1:30 PM" class="p_time"/>1:30 PM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="14:00:00_2:00 PM" class="p_time"/>2:00 PM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="14:30:00_2:30 PM" class="p_time"/>2:30 PM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="15:00:00_3:00 PM" class="p_time"/>3:00 PM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="15:30:00_3:30 PM" class="p_time"/>3:30 PM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="16:00:00_4:00 PM" class="p_time"/>4:00 PM <br></div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="16:30:00_4:30 PM" class="p_time"/>4:30 PM <br> </div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="17:00:00_5:00 PM" class="p_time"/>5:00 PM <br>
</div>
<div class='col-sm-3 time_css'>
<input type="radio" id="p_time" name="p_time" value="17:30:00_5:30 PM" class="p_time"/>5:30 PM <br>
</div>



</p>



 <div class="form-group">
						<div id="loader_v"></div>
                        <div id="result_v" class="myform_clean_v col-sm-12"></div>
                    </div>

                    <input type="button" id="p_btn" class="pull-right btn btn-primary p_btn" value="Submit Appointments" />

<br>
      </div>
<br><br>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--  Modal ends -->











</div>

</body>
</html>
