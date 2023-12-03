<?php 
error_reporting(0);
?>


<style>
.r_cssx{
background:#ddd;
padding:10px;
height:200px;
border:none;
color:black;
border-radius:1%;


}


.r_cssx:hover{
background:orange;
color:black;

}

</style>

<?php 

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

session_start();
$userid_sess =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));

include('data6rst.php');

// get total count
$pstmt = $db->prepare('SELECT * FROM appointments where userid=:userid');
$pstmt->execute(array(':userid' =>$userid_sess));
$total_count = $pstmt->rowCount();

if($total_count == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>You have no Medical Appointment Record Yet</div><br>";
exit();
}


//$result = $pstmt->fetchAll();
//foreach($result as $row){
while($row = $pstmt->fetch()){
$rows1 = array();
$id = $row['id'];
$email = $row['email'];
$fullname = $row['fullname'];
$userid = $row['userid'];
$timing = $row["timing"];
$services_title = $row["services_title"];
$a_date = $row['a_date'];
$a_time = $row['a_time'];
$status = $row['status'];
$diagnosis = $row['diagnosis'];
$medication = $row['medication'];
$content = $row['content'];

$s_t= "<span style='color:purple;font-size:16px;'><b>$services_title</b></span>";
$com= "<span style='color:green;font-size:14px;'>$status</span>";

if($status == 'Open'){

$st = "Awaiting Doctors Approval";
$colorx ="red_css";
}else{

$st = "Approved";
$colorx ="green_css";

}



if($status == 'Open'){


                  
$rxc= "<div style='color:green;background:;padding:4px;font-size:12px;' id='status1_$id'></div>
<button style='display:nonex;' id='statushide_$id' title='Click to Approve Appointments' class='report_css updates_btn'
 data-id='$id'
 data-userid='$id'
 >
 Click to Approve Appointments</button>
 <div class='loader-updates_$id'></div>
   <div class='result-updates_$id'></div>";

}else{
$rxc="<div style='color:green;background:;padding:4px;font-size:12px;'>Approved";

}





        echo "<div class='r_cssx'>
<b>Appointment Title: </b> $s_t<br> 
<b>Fullname: </b> $fullname<br>  
<b>Email: </b> $email<br>  
<b>Appointment Status: </b> <span class='$colorx' > $st </span><br>
<b>Appointment Date: </b> $a_date<br> 
<b>Appointment Time: </b> $a_time<br> 
<b>Created Time: </b> <span data-livestamp='$timing'></span><br><br>





<button type='button'  class='btn btn-primary btn-xs btn_call med_btnx' data-toggle='modal' data-target='#myModal_med'
data-id='$id'
data-userid='$userid'
data-email='$email'
data-fullname='$fullname'
data-services_title='$services_title'
data-status='$status'
data-timing='$timing'
data-diagnosis='$diagnosis'
data-medication='$medication'
data-content='$content'
>View Your Medical Appointments Details</button>

</div>";


}





}
else{
echo "<div id='alertdata_uploadfiles' style='background:red;color:white;padding:10px;border:none;'>
Direct Page Access not Allowed<br></div>";
}




?>