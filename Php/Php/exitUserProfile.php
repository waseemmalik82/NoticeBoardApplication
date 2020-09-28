<?php
require "connection.php";

$UserName =$_POST["FirstName"];
$Email=$_POST["Email"];
$Password=$_POST["Password"];
$Discipline=$_POST["Discipline"];
$Batch=$_POST["Batch"];
$id=$_POST["UserId"];



$response = array();
	$sql="UPDATE `user` SET `UserName` = '$UserName', `Email` = '$Email', `Password` = '$Password', `Discipline` = '$Discipline', `Batch` = '$Batch' WHERE `user`.`UserId` = $id";
	
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