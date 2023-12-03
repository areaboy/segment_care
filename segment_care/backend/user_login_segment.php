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

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$pass = $password;

if ($email == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Email is Empty.</div>";
exit();
}

if ($pass == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Password is Empty..</div>";
exit();
}


include('data6rst.php');
$result = $db->prepare('SELECT * FROM users where email = :email');
		$result->execute(array(
			':email' => $email ));

$count = $result->rowCount();
$row = $result->fetch();
if( $count == 1 ) {

$password = strip_tags($_POST['password']);
if (password_verify($password, $row["password"])) {

//start hashed passwordless Security verify
//if(password_verify($password, $row["password"])){
            //echo "Password verified and ok";

$userid = $row['id'];
$fullname = $row['fullname'];
$email = $row['email'];
$role = $row['status'];



if($role=='Patients'){

$status ='Patients';
}

if($role=='Staff'){
$status ='Medical Staff/Doctor';
}

// Track User Action
include('../twilio_segment_track_settings.php');

echo "
<script>

var analysis = analytics.identify('$userid', {
  name: '$fullname',
  email: '$email'
});


var track = analytics.track('$logged_in', {
  Name: '$fullname',
  Email: '$email',
  Status: '$status',
  Notes: '$fullname($role) just Logged In..'
});

</script>";





// initialize session if things where ok
session_start();
session_regenerate_id();
$timer = time();
$token = $timer;

// initialize session if things where ok.
$_SESSION['uid'] = $row['id'];
$_SESSION['fullname'] = $row['fullname'];
$_SESSION['profession'] = $row['profession'];
$_SESSION['role'] = $row['status'];
$_SESSION['email'] =$row['email'];
$_SESSION['token'] = $token;


echo "<div style='background:green;padding:8px;color:white;border:none;'>Login sucessful.<img src='ajax-loader.gif'></div>";


if($role=='Patients'){

echo "<script>
window.setTimeout(function() {
  window.location.href = 'dashboard_patients.php';
}, 5000);
</script>";


exit();
}



if($role=='Staff'){
echo "<script>
window.setTimeout(function() {
  window.location.href = 'dashboard_doctors.php';
}, 5000);
</script>";


exit();
}




}
else{

echo "<div style='background:red;padding:8px;color:white;border:none;'>Password does not match..</div>";

}



}
else {

echo "<div style='background:red;padding:8px;color:white;border:none;'>User with this Email does not Exist</div>";
}



}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Page Access Not Allowed...</div>";
}




?>