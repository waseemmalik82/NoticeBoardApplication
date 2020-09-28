<?php
require "connection.php";

$id=$_POST["DAdminid"];
$Password=$_POST["Password"];

$response = array();
	$sql="UPDATE `disciplineadmin` SET `password` = '$Password' WHERE `disciplineadmin`.`id` = $id";
	
	$result = mysqli_query($conn,$sql);
	
	if(!$result)
	{
	$code = "Failed";
	$message = "Server not response";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
	}
	else
	{
	$code = "Success";
	$message = "Thank you for editing. Now....,";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
	}
mysqli_close($conn);
?>