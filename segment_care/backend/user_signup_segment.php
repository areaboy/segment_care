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
$first_name = strip_tags($_POST['first_name']);
$last_name = strip_tags($_POST['last_name']);
$phone_number = strip_tags($_POST['phone_number']);
$stx= strip_tags($_POST['status']);
$profession = strip_tags($_POST['profession']);

$pass = $password;




//hash password before sending it to database...
$options = array("cost"=>4);
$hashpass = password_hash($pass,PASSWORD_BCRYPT,$options);



include('data6rst.php');
if($pass ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;'>Password Cannot be Empty</div><br>";
exit();
}

if($email ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;'>Email Address Cannot be Empty</div><br>";
exit();
}


$em= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$em){
echo "<div  style='background:red;color:white;padding:10px;border:none;' id='err'>Email Address is Invalid</div>";
exit();
}



if($stx ==''){

echo "<div  style='background:red;color:white;padding:10px;border:none;'>Status Cannot be Empty</div><br>";
exit();
}


if($profession ==''){

echo "<div  style='background:red;color:white;padding:10px;border:none;'>Profession Cannot be Empty</div><br>";
exit();
}

if($first_name ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;'>First_name Cannot be Empty</div><br>";
exit();
}

$fullname ="$last_name $first_name";



$statement = $db->prepare('INSERT INTO users
(first_name,last_name,password,fullname,email,phone_number,status,profession)
 
                          values
(:first_name,:last_name,:password,:fullname,:email,:phone_number,:status,:profession)');

$statement->execute(array( 
':first_name' => $first_name,
':last_name' => $last_name,
':password' => $hashpass,
':fullname' => $fullname,
':email' => $email,		
':phone_number' => $phone_number,
':status' => $stx,
':profession' =>$profession
));



if($stx=='Patients'){

$status ='Patients';
}



if($stx=='Staff'){
$status ='Medical Staff/Doctor';
}

$res = $db->query("SELECT LAST_INSERT_ID()");
$lastId_user = $res->fetchColumn();

$role = $stx;


// Track User Action
include('../twilio_segment_track_settings.php');

echo "
<script>

var analysis = analytics.identify('$lastId_user', {
  name: '$fullname',
  email: '$email'
});


var track = analytics.track('$signed_up', {
  Name: '$fullname',
  Email: '$email',
  Status: '$role',
  Notes: '$fullname($role) just Signed up'
});

</script>";




if($statement){

echo "<div class='well alerts alert-success'>Data Created Successfully.
.Redirecting in 3 second to Login Section.....<img src='loader.gif'><br></div>";


echo "<script>
window.setTimeout(function() {
    //window.location.href = 'login.php';
location.reload();
}, 5000);
</script><br><br>";


}
else {
echo "<div class='alerts alert-danger'>Your Data cannot be submitted to database.<br></div>";
}

}
else{
echo "<div id='' style='background:red;color:white;padding:10px;border:none;'>
Direct Page Access not Allowed<br></div>";
}



?>