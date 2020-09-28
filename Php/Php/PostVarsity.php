<?php

require "connection.php";

$Title =$_POST["Title"];
$Description=$_POST["Description"];
$Fname=$_POST["FileName"];
$Sname=$_POST["ShowName"];
$AdminId=$_POST["AdimId"];

$response = array();
	$sql="INSERT INTO `varsitynotice` (`NoticeId`, `Title`, `Description`, `FileName`, `ShowFile`, `AdminId`, `Date`) VALUES (NULL, '$Title', '$Description', '$Fname','$Sname', '$AdminId', CURRENT_TIMESTAMP)";
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
	$message = "Thank you for publishing. Now....,";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
	}
mysqli_close($conn);
?>