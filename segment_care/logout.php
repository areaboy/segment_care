<?php
error_reporting(0);

?>
<html>

<head>


<?php include('twilio_segment.php'); ?>
</head>
<body>


<?php
session_start();
$userid =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));
$fullname =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$email =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));
$profession = strip_tags($_SESSION['profession']);
$role = strip_tags($_SESSION['role']);


if($role=='Patients'){

$status ='Patients';
}

if($role=='Staff'){
$status ='Medical Staff/Doctor';
}

// Track User Action
include('twilio_segment_track_settings.php');

echo "
<script>

var analysis = analytics.identify('$userid', {
  name: '$fullname',
  email: '$email'
});


var track = analytics.track('$logout', {
  Name: '$fullname',
  Email: '$email',
  Status: '$status',
  Notes: '$fullname($role) just Logged Out..'
});

</script>";






echo "<div style='background:green;padding:8px;color:white;border:none;'>You are being Logged Out.<img src='ajax-loader.gif'></div>";


if($logout !=''){

// Now Log Out
unset($_SESSION["uid"]);
unset($_SESSION["token"]);
session_destroy();
//header("Location:index.php");

echo "<script>
window.setTimeout(function() {
  window.location.href = 'index.php';
}, 6000);
</script>";


}

?>



