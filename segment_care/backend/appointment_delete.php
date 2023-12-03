
<?php

session_start();

$fullname =  htmlentities(htmlentities($_SESSION['fullname'], ENT_QUOTES, "UTF-8"));
$email =  htmlentities(htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8"));
$userid =  htmlentities(htmlentities($_SESSION['uid'], ENT_QUOTES, "UTF-8"));
$id = strip_tags($_POST['id']);


if($id ==''){

//echo "<div  style='background:red;color:white;padding:10px;border:none;'>ID Cannot be Empty</div><br>";
exit();
}



include('data6rst.php');
$result = $db->prepare('DELETE FROM appointments where id = :id');
		$result->execute(array(
			':id' => $id ));

if($id){

$response = ['status' => 1, 'message' => "Deletion SuccessFully. Wait. Refreshing Page.... "];
echo json_encode($response);

}else{
$response = ['status' => 0, 'message' => "Data Deletion Failed. Try Again."];
echo json_encode($response);

exit();

}






?>

