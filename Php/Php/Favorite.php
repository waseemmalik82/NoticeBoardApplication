<?php

require "connection.php";

$NoticeId=$_POST["NoticeId"];
$UserId =$_POST["UserId"];
$Seen=$_POST["Fav"];

$sql="SELECT UserId,NoticeId FROM `$Seen` where UserId like '$UserId' and NoticeId like '$NoticeId' ";

$result = mysqli_query($conn,$sql);
$response = array();
if(mysqli_num_rows($result)>0)
{
	$code = "Reg_failed";
	$message = "User already exist.....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);

}
else
{
	$sql="INSERT INTO `$Seen` (`Id`, `NoticeId`, `UserId`) VALUES (NULL, '$NoticeId', '$UserId')";
	$result = mysqli_query($conn,$sql);
	$code = "Success";
	$message = "Thank you for registering with us. Now....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>