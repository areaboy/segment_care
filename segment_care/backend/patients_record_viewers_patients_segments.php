<?php
error_reporting(0);


?>
<html>

<head>


<?php include('../twilio_segment.php'); ?>
</head>
<body>


<?php
//error_reporting(0);
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

session_start();
//include ('authenticate.php');

$userid =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));
$fullname =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$token =   htmlentities(htmlentities($_SESSION['token'], ENT_QUOTES, "UTF-8"));
$email =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));
$profession = strip_tags($_SESSION['profession']);
$role = strip_tags($_SESSION['role']);

$patient_fullname = strip_tags($_POST['fullname']);
$patient_email = strip_tags($_POST['email']);
$status = strip_tags($_POST['status']);
$title = strip_tags($_POST['services_title']);

$mt_id=rand(0000,9999);
$dt2=date("Y-m-d H:i:s");
$ipaddress = strip_tags($_SERVER['REMOTE_ADDR']);
$tm = time();




// Track User Action
include('../twilio_segment_track_settings.php');

echo "
<script>

var analysis = analytics.identify('$userid', {
  name: '$fullname',
  email: '$email'
});


var track = analytics.track('$medical_appointment_record_viewers', {
  Name: '$fullname',
  Email: '$email',
  Notes: 'Patient($fullname) Viewed His/Her Medical Appointment Data..'
});

//alert(track);

</script>";





//echo "success";

}
else{
echo "<div id='' style='background:red;color:white;padding:10px;border:none;'>
Direct Page Access not Allowed<br></div>";
}





?>



