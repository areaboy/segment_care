
<?php

session_start();
$fullname =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$email =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));

$userid =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));


include('data6rst.php');

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$id = strip_tags($_POST['id']);


$res = $db->prepare('select * from appointments where id=:id');
$res->execute(array(':id' =>$id));
$rowb = $res->fetch();
$patient_fullname=htmlentities($rowb['fullname'], ENT_QUOTES, "UTF-8");


$update = $db->prepare('UPDATE appointments set status =:status WHERE id =:id');
$update->execute(array(':status' => 'Closed', ':id' => $id));

if($update){
$return_arr = array("status"=>'Approved',"message"=>'1');
echo json_encode($return_arr);
}


}
else{
echo "<div id='' style='background:red;color:white;padding:10px;border:none;'>
Direct Page Access not Allowed<br></div>";
}

?>


