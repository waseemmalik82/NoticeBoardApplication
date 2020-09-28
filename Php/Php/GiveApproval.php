<?php
require "connection.php";

$NoticeId=$_POST["NoticeId"];
$table=$_POST["Discipline"];

$response = array();
	$sql="UPDATE `$table` SET `Approval` = '1' WHERE `$table`.`NoticeId` = '$NoticeId'";
	
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