<?php
require "connection.php";

$UserId =$_POST["UserId"];

$response = array();

$sql="SELECT UserId FROM admin where UserId like '$UserId' ";

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
	$sql="INSERT INTO `admin` (`AdminId`, `UserId`) VALUES (NULL, '$UserId')";
	$result = mysqli_query($conn,$sql);
	$code = "Success";
	$message = "Thank you for registering with us. Now....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>