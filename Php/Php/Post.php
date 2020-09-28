<?php

require "connection.php";

$Title =$_POST["Title"];
$Description=$_POST["Description"];
$Type=$_POST["NoticeType"];
$Fname=$_POST["FileName"];
$Sname=$_POST["ShowName"];
$UserId=$_POST["UserId"];
$Discipline=$_POST["Discipline"];


$Approve="0";

$AdminId=$UserId;
$sql="Select AdminId from admin where AdminId like'$AdminId'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$Approve="1";
}


$response = array();
	$sql="INSERT INTO `$Discipline` (`NoticeId`, `Title`, `Description`, `FileName`, `ShowFile`, `NoticeType`, `Approval`, `UserId`, `Date`) VALUES (NULL, '$Title', '$Description', '$Fname','$Sname', '$Type', '$Approve', '$UserId', CURRENT_TIMESTAMP)";
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