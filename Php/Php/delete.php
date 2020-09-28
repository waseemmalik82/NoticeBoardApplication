<?php
require "connection.php";

$NoticeId=$_POST["NoticeId"];
$table=$_POST["Discipline"];
$Seen=$_POST["seen"];

$response = array();
$sql="Delete from $table WHERE `$table` = '$NoticeId'";
$sqll="Delete from $Seen WHERE `NoticeId` = '$NoticeId'";
$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_query($conn,$sql))
{
	$result = mysqli_query($conn,$sqll);
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