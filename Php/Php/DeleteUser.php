<?php
require "connection.php";

$id=$_POST["UserId"];

$response = array();
$sql="Delete from user WHERE `UserId` = '$id'";

$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_query($conn,$sql))
{
	$code = "Success";
	$message = "Delete successfully..";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
else
{
	$code = "delete failed";
	$message = "failed...";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>