<?php

require "connection.php";

$Name=$_POST["Name"];
$Password=$_POST["Password"];

$sql="SELECT adminId,VarsityName,password FROM superadmin where VarsityName like '$Name' and password like '$Password' ";

$result = mysqli_query($conn,$sql);
$response = array();
if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$AdminId=$row[0];
	$code = "Success";
	array_push($response,array("code"=>$code,"SuperAdminId"=>$AdminId,"AdminId"=>"-1"));
        echo json_encode($response);

}
else
{
$sql="SELECT id,disciplineName,password FROM disciplineadmin where disciplineName like '$Name' and password like '$Password' ";
	
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$AdminId=$row[0];
	$code = "Success";
	array_push($response,array("code"=>$code,"AdminId"=>$AdminId,"SuperAdminId"=>"-1"));
        echo json_encode($response);
}
else
{
	$code = "Login_failed";
	$message = "User not found...Please try again...";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
}
mysqli_close($conn);
?>