<?php
error_reporting(0);


?>
<html>

<head>


<?php include('../twilio_segment.php'); ?>
</head>
<body>




<?php

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

session_start();
//include ('authenticate.php');

$userid =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));
$fullname =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$token =   htmlentities(htmlentities($_SESSION['token'], ENT_QUOTES, "UTF-8"));
$email =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));
$profession = strip_tags($_SESSION['profession']);
$role = strip_tags($_SESSION['role']);

include('data6rst.php');



$p_date = strip_tags($_POST['p_date']);
$p_time = strip_tags($_POST['p_time']);

$title = strip_tags($_POST['title']);
$desc = strip_tags($_POST['desc']);

$mt_id=rand(0000,9999);
$dt2=date("Y-m-d H:i:s");
$ipaddress = strip_tags($_SERVER['REMOTE_ADDR']);
$tm = time();
$titlex ="Medical Appointments on $title --$tm";




if ($email == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Email Address is empty</font></div>";
exit();
}

$em= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$em){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Email Address is Invalid</font></div>";
exit();
}

$ip= filter_var($ipaddress, FILTER_VALIDATE_IP);
if (!$ip){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>IP Address is Invalid</font></div>";
exit();
}

		
$timer1= time();



$title = strip_tags($_POST['title']);



if($role=='Patients'){

$status ='Patients';
}

if($role=='Staff'){
$status ='Medical Staff/Doctor';
}

// Track User Action
include('../twilio_segment_track_settings.php');

$book_medical_appointment;


echo "
<script>

var analysis = analytics.identify('$userid', {
  name: '$fullname',
  email: '$email'
});


var track = analytics.track('$book_medical_appointment', {
  Name: '$fullname',
  Email: '$email',
  Status: '$status',
  Notes: '$fullname($status) just Booked Medical Appointment for $title.'
});



</script>";






$statement = $db->prepare('INSERT INTO appointments
(userid,email,fullname,services_title,status,a_date,a_time,timing,diagnosis,medication,content)
                          values
(:userid,:email,:fullname,:services_title,:status,:a_date,:a_time,:timing,:diagnosis,:medication,:content)');

$statement->execute(array( 
':userid' => $userid,
':email' => $email,
':fullname' => $fullname,
':services_title' => $title,
':status' => 'Open',
':a_date' => $p_date,
':a_time' => $p_time,
':timing' => $timer1,
':diagnosis' => '0',
':medication' => '0',
':content' => $desc
));


$res = $db->query("SELECT LAST_INSERT_ID()");
$lastId_post = $res->fetchColumn();





if($statement){
echo "<div id='alertdata' style='background:green;color:white;padding:10px;border:none;'><br>Appointment Booked Successfully..</div>";

echo "<script>alert('Appointment Submitted Successfully');
// location.reload();
</script>";

echo "<script>
window.setTimeout(function() {
    //window.location.href = 'dashboard.php';
location.reload();
}, 5000);
</script><br><br>";


}
else {
echo "<div id='alertdata' class='alerts alert-danger'>Appointment Boooking Failed. Please Try Again...<br></div>";
}







}
else{
echo "<div id='' style='background:red;color:white;padding:10px;border:none;'>
Direct Page Access not Allowed<br></div>";
}





?>



