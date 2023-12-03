

<?php


$logo = 'logo.png';
$title = 'Segment Care';
$description = 'Secured Online Medical Appointments Booking & Intrusion Detection System Powered by <b>Twilio Segments & Amazon S3 Cloud Storage</b>';

$header_color = 'purple';
$header_color2 = 'green';
$footer_color = 'black';
$site_display = 'Health';




?>




<!DOCTYPE html>
<html lang="en">

<head>
 <title><?php echo $title; ?></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $description; ?>" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="scripts/bootstrap.min.css">
<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/app_script_segment.js"></script>
<link type="text/css" rel="stylesheet" href="scripts/storex.css">

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


<style>


.modal_head_color{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
}

.category_post1{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
z-index: -999;
}
.category_post1:hover {
background: black;
color:white;
}	

/* navigation */


.left-column-all {
    overflow-x: hidden;
    position: fixed;
    z-index: 9999;
    width:50vw;
    height: 100vh;
    background: url(home1.png) center no-repeat <?php echo $header_color; ?>;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -ms-background-size: cover;
    -o-background-size: cover;

/*
    margin-top: 0px;
    margin-left: 0px;
    */
}



@media screen and (max-width: 1440px) {
.left-column-all {
width:100vw;
width:100vh;

}

}
	
.right-column-all {
 margin-left:40vw;
/*
margin-left:47vw;
*/
}

@media screen and (max-width: 800px) {
.left-column-all {
    width: 100vw;
    position: inherit;
    background-position: inherit;
}

.right-column-all {
    margin-top: 0px;
margin-left: 0px;

}
}




/*ensure that category button does not jam about us or event section when on mobile start here. you can remove it if you
like. this will make product contain maximum of 8 categories button*/
@media screen and (max-width: 768px) {
.left-column-all {
   padding-bottom:700px;
}
}

@media screen and (max-width: 600px) {
.left-column-all {
   padding-bottom:700px;

}
}

/*ensure that category button does not jam about us or product section when on mobile ends here.*/




.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color: <?php echo $header_color; ?>;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: <?php echo $header_color; ?>;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:fuchsia;
color:white;

}





/* home starts */
  
.home_image {	
width:100%;
/*
height:500px;
max-height:500px;
*/
height:100vh;
max-height:100vh;
       
        
}

.home_content_head {
        color: white;
        font-size:40px;
        font-weight:bold;
	font-family:comic sans ms; 
width:40vw;
margin-left:-110px;
  
}

.home_content_text {
        color: white;
        font-size:20px;
        font-weight:bold;
	box-sizing: border-box;
      //position: relative;
        
}

.home{
background:#ec5574;
}

.home:hover{
box-shadow: inset 0 0 0 25px <?php echo $header_color; ?>;

}


.home_text_transparent_home {
border-style: solid; border-width:1px; border-color: orange;
  width: 100%;
  padding: 90px;
  position: absolute;
  bottom: 0px;
  background: rgba( 0, 0, 0, 0.50);

  color: white;
  height:100%;
text-align: center;

}



@media screen and (max-width: 768px) {
  .home_text_transparent_home{

  width: 100%;
  padding: 20px;
  }
}



@media screen and (max-width: 600px) {
  .home_content_home{
  width: 100%;
  padding: 20px  
  }
}













.marquee_button{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
font-size:14px;
//border-radius: 50%;
transform: skew(15deg);
border: none;
cursor: pointer;
text-align: center;



}
.marquee_button:hover {
background: black;
color:white;
}


.marquee_image{ 
width:60px;height:60px;
border-radius: 50%;
border-style: solid; border-width:2px; border-color: <?php echo $header_color; ?>;
}






/* footer */


  .navbar_footer {
letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
    //background-color:fuchsia;
    color:white;
    padding:20px;
    border: 0;
    font-family: comic sans ms;
  }


.footer_bgcolor{
background: <?php  echo $footer_color; ?>;
}

.footer_text1{
color:white;
font-size:20px;
border:none;
cursor:pointer;
}


.footer_text2{
color:grey;
font-size:14px;
border:none;
cursor:pointer;
}


.footer_text3{
color:grey;
font-size:24px;
border:none;
cursor:pointer;
}

.footer_text1:hover{
color:grey;
}


.footer_text2:hover{
color:orange;
}


.footer_text3:hover{
color:orange;
}

.footer_dashedline{
 border-top: 1px dashed white;
}


.contact_info{

background: fuchsia;
color:white;
cursor: pointer;
padding:16px;
border-radius: 10%;

}
.contact_info:hover{
background: orange;
color:black;

}


.contact_info_dashedline{
  border-bottom: 5px dashed <?php echo $header_color; ?>;

}


.left_shifting{

width:40%;
}

@media screen and (max-width: 768px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}


}



@media screen and (max-width: 600px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}

}

.modaling_sizing{
width:59%;
}


@media screen and (max-width: 768px) {
.modaling_sizing {
width:99%;

}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center;
}


}

@media screen and (max-width: 600px) {
.modaling_sizing {
width:99%;
}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center; 
}



}

.category_post{
background-color: <?php echo $header_color; ?>;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	



.category_post2{
background-color: <?php echo $header_color; ?>;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	




.category_post2x{
background-color: <?php echo $header_color2; ?>;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post2x:hover {
background: black;
color:white;
}	



.modal-dialog{
   
   margin-top: 80px;
} 

</style>



 
</head>
<body>























<!--start left column all-->

    <div class="left-column-all left_shifting">

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     <li class="navbar-brand home_click imagelogo_li_remove" ><img title='<?php  echo $title; ?>-logo' alt='<?php  echo $title; ?>-logo' class="img-rounded imagelogo_data" src="<?php echo $logo; ?>"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">

 <li style='' class="navgate_no">
<a title='Apps Inspiration'  data-toggle="modal" data-target="#myModal_inspiration" style="color:white;font-size:14px;">
<button class="category_post1">App Inspiration & What It Does</button></a></li>


      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->


<!-- create User Medical Staff Modal start -->



<div id="myModal_signup_staff" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: #008080;color:white;padding:10px;'>
        <h4 class="modal-title">Medical Staff SignUp Form Monitored & Protected by Twilio Segment.</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

 <div class="form-group col-sm-6">
              <label> Enter Firstname</label>
              <input type="text" class="col-sm-12 form-control" id="first_name" name="first_name" placeholder="Enter First Name">
            </div>


 <div class="form-group col-sm-6">
              <label> Enter Lastname</label>
              <input type="text" class="col-sm-12 form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>


<br>


 <div class="form-group  col-sm-6">
              <label> Enter Phone Number</label>
              <input type="text" class="col-sm-12 form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value='+12345678901'>
            </div>




 <div class="form-group   col-sm-6">
              <label> Enter Email Address </label>
              <input type="text" class="col-sm-12 form-control" id="email" name="email" placeholder="Enter Email">
            </div>
<br>

 <div class="form-group">
              <label> Enter Password </label>
              <input type="password" class="col-sm-12 form-control" id="password" name="password" placeholder="Enter Password">
            </div>
<br>


 <div class="form-group">
              <label>Confirm Password </label>
              <input type="password" class="col-sm-12 form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
            </div>
<br>






 <div class="form-group">
              <label> Select  Profession </label>
              <select class="col-sm-12 form-control" id="profession" name="profession">
<option value=''>--Select Medical Professions</option>
<option value='Dentist'>Dentist</option>
<option value='Occulist'>Occulist</option>
<option value='Padeatricians'>Padeatricians</option>
<option value='Gynaecologist'>Gynaecologist</option>
<option value='Nurses'>Nurses</option>
<option value='Mid-Wives'>Mid-Wives</option>
</select>
            </div>
<br><br>

 <div class="form-group">
						<div id="loader_signup"></div>
                        <div id="result_signup" class="myform_clean_signup"></div>
                    </div>

                    <input type="button" id="signup_btnx" class="pull-right btn btn-primary signup_btnx" value="Add Medical Staff" />


      </div>
<br><br>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Create User Medical Staff Modal ends -->












<!-- create User Patients  Modal start -->



<div id="myModal_signup_patients" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: #008080;color:white;padding:10px;'>
        <h4 class="modal-title">Patients SignUp Form Monitored & Protected by Twilio Segment.</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

 <div class="form-group col-sm-6">
              <label> Enter Firstname</label>
              <input type="text" class="col-sm-12 form-control" id="first_namep" name="first_namep" placeholder="Enter First Name"  value="">
            </div>


 <div class="form-group col-sm-6">
              <label> Enter Lastname</label>
              <input type="text" class="col-sm-12 form-control" id="last_namep" name="last_namep" placeholder="Enter Last Name" value="">
            </div>


<br>




 <div class="form-group  col-sm-6">
              <label> Enter Phone Number</label>
              <input type="text" class="col-sm-12 form-control" id="phone_numberp" name="phone_numberp" placeholder="Phone Number" value='+12345678901'>
            </div>


 <div class="form-group  col-sm-6">
              <label> Enter Email Address </label>
              <input type="text" class="col-sm-12 form-control" id="emailp" name="emailp" placeholder="Enter Email" value="">
            </div>
<br>

 <div class="form-group">
              <label> Enter Password </label>
              <input type="password" class="col-sm-12 form-control" id="passwordp" name="passwordp" placeholder="Enter Password" value=''>
            </div>
<br>


 <div class="form-group">
              <label>Confirm Password </label>
              <input type="password" class="col-sm-12 form-control" id="password_confirmp" name="password_confirmp" placeholder="Confirm Password" value=''>
            </div>
<br>




 <div class="form-group">
						<div id="loader_signupp"></div>
                        <div id="result_signupp" class="myform_clean_signupp"></div>
                    </div>

                    <input type="button" id="signup_btnxp" class="pull-right btn btn-primary signup_btnxp" value="Register Patients" />


      </div>
<br><br>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Create User Patients Modal ends -->









<!-- user Login  Modal start -->



<div id="myModal_login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: #008080;color:white;padding:10px;'>
        <h4 class="modal-title"> Login System Form  Protected and Secured by Twilio Segment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


 <div class="form-group">
              <label> Enter Email Address </label>
              <input type="text" class="col-sm-12 form-control" id="emailxa" name="emailxa" placeholder="Enter Email" value=''>
            </div>
<br>

 <div style='' class="form-group">
              <label> Enter Password </label>
              <input type="password" class="col-sm-12 form-control" id="passwordxa" name="passwordxa" placeholder="Enter Password" value=''>
            </div>
<br>


 <div class="form-group">
						<div id="loader_login"></div>

                    <input type="button" id="login_btn" class="pull-right btn btn-primary login_btn" value="login" />

<br>
                        <div id="result_login" class="myform_clean_login"></div>
                    </div>



      </div>
<br><br>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--User Login Modal ends -->








<!-- Inspiration  Modal start -->



<div id="myModal_inspiration" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: #008080;color:white;padding:10px;'>
        <h4 class="modal-title"> Apps Inspiration</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

<h3>Inspiration:</h3>
Hundred's of thousands of <b>Healthcare Institutions</b> are in surge and in troubles due to range of Cyber Attacks from Cyber Criminals who wants to steal 
Patients Sensitive Medical Information's.<br><br>

Some of this attacks to Healthcare Industries includes <b>Bots Attacks, Web application attacks</b> and most especially an <b>Insider Threats Attacks and Much More.</b><br>
<br>
Its time to <b>Secure, Protect, Monitor and track </b> all the activities going on to and from your  <b>online Healthcare System</b> by leveraging <b>Twilio Segment
and Amazon S3 Cloud Storage</b>.

<h3>What It Does:</h3>

<b>Segment Care:</b>  is a Secured Online Medical Appointments Booking & Intrusion Detection System Powered by <b>Twilio Segments & Amazon S3 Cloud Storage</b>.<br><br>

<ul>
<li>
It allows Patients to securely Schedule and book online Medical Appointments with Doctors/Medical Teams.
</li><br>

<li>
Within the applications, When Patients Books Appointments, Doctors/Medical Team in turn will <b>review/access</b> all Patients Medical Appointments Data.

Doctors/Medical Team can then <b>approve and manage</b> medical appointments with Patients.
</li>

</ul>

<h3>Patients  Medical Data Made Secured with Twilio Segment Monitoring Services & Amazon S3 Cloud Storage:</h3>

We leverage <b>Twilio Segment Monitoring Services & Amazon S3 Cloud Storage</b> to <b>store, secure, monitor and track</b> all the activities including
both <b>Insider and Outside Threats</b> originating to and from your <b>online Healthcare System</b>........<br><br>

By Leveraging <b>Twilio Segment Monitoring Services & Amazon S3 Cloud Storage</b>, our Online HealthCare System automatically: <br><br>

<ul>


<li>
Identify, Monitors and Track all Users who Signed up both Doctors and Patients.
</li>
<br>
<li>
Identify, Monitors and Track all Users who Logged in both Doctors and Patients.
</li><br>

<li>
Identify, Monitors and Track all Users who Logged Out both Doctors and Patients.
</li>
<br>
<li>
Identify, Monitors and Track all Patients who Booked Medical Appointment
</li>
<br>
<li>
Identify, Monitors and Track all Doctors who accept and approve Patients Medical Appointments
</li>
<br>
<li>
Identify, Monitors and Track all Doctors who Deleted Patients Medical Appointment  data.
</li>
<br>
<li>
 Identify, Monitors and Track all Doctors who viewed and access Patients Medical Appointment data and much more
</li>
<br>
</ul>

      </div>
<br><br>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--Inspiration Modal ends -->
























<div class="home_text_transparent_home" >
<div class="home_resize_padding"> 


<p class="home_content_head pull-left"><?php echo $title; ?></p>
<marquee> <p class=""><button class="contact_click marquee_button"><img class="marquee_image" src="home1.png" /><?php echo $title; ?></button> </p></marquee>

                      

<style>


.dropdown_color:hover{
background: black;
color:white;

}
</style>


  <p class="home_content_text">Medical Staff/Doctors Access Only</p><br>

<p>

<a  class="category_post" data-toggle="modal" data-target="#myModal_signup_staff">Medical Staff Signup</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a  class="category_post" data-toggle="modal" data-target="#myModal_login">Medical Staff Login</a>

</p>


<br> 

<br><br>




  <p class="home_content_text">Patients Access Only</p>

<p>

 Signup to Book Medical Appointments<br><br>

<a  class="category_post2x" data-toggle="modal" data-target="#myModal_signup_patients">Patients Signup</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a  class="category_post2x" data-toggle="modal" data-target="#myModal_login">Patients Login</a><br><br><br>


</p>


<br> 



     
</div> 
</div>


    </div>
<!--end left column all-->









<!--start right column all-->
    <div class="right-column-all">




















<!-- about Section start-->
<div  class="about section_padding aboutus_bgcolor" style=''>


  <h2 class="text-center"><span class="contact_name_color">About <?php echo $title; ?></span></h2>
<p class="footer_text3"><?php echo $description; ?> </p>
<div id='network_status'></div><br>
<img style="width:100%;min-width:100%;max-width:100%;height:400px;" src="home2.png">

<style>
.hh{
color:#800000;
}

.hh:hover{
color:black;
}
</style>
  <h2 style='display:none' class="text-center"><span class="contact_name_color hh">Powered by.</span></h2>


</div>




<!-- about Section ends-->









<style>
.xcx1{
background-color: #ccc;
padding: 2px;
color:black;
font-size:14px;
border-radius: 10%;
border: none;
//cursor: pointer;
text-align: center;

}
.xcx1:hover {
background: orange;
color:white;
}	
</style>





<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">

        <div class="col-sm-12">

<p class="footer_text1"><?php echo $title; ?></p>
<p class="footer_text2"><?php  echo $description; ?></p>
<br>



        </div>

 
</div>



</div>

<div class="footer_text1">
<p class="footer_text1"></p>
</div>


<div class="footer_dashedline"></div>

 </footer>

<!-- footer Section ends -->
	




<div>
  <!--end right column all-->    







   
</body>
</html>























