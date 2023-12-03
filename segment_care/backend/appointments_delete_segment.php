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
include ('data6rst.php');

$userid =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));
$fullname =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$token =   htmlentities(htmlentities($_SESSION['token'], ENT_QUOTES, "UTF-8"));
$email =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));
$profession = strip_tags($_SESSION['profession']);
$role = strip_tags($_SESSION['role']);

$id = strip_tags($_POST['id']);
$res = $db->prepare('select * from appointments where id=:id');
$res->execute(array(':id' =>$id));
$rowb = $res->fetch();
$patient_fullname=htmlentities($rowb['fullname'], ENT_QUOTES, "UTF-8");


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


var track = analytics.track('$appointment_delete', {
  Name: '$fullname',
  Email: '$email',
  Notes: 'Medical Staff/Doctor($fullname) Deleted Patients($patient_fullname) Medical Appointment Data..'
});

</script>";




echo "<script>
window.setTimeout(function() {
//alert('success');
}, 6000);
</script>";


}
else{
echo "<div id='' style='background:red;color:white;padding:10px;border:none;'>
Direct Page Access not Allowed<br></div>";
}





?>














