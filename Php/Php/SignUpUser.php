<?php

require "connection.php";

$UserName =$_POST["FirstName"];
$Email=$_POST["Email"];
$Password=$_POST["Password"];
$Discipline=$_POST["Discipline"];
$Batch=$_POST["Batch"];

$sql="SELECT Email,Password FROM user where Email like '$Email' and Password like '$Password' ";
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
	$sql="INSERT INTO `user` (`UserName`,`Email`,`Password`,`Discipline`,`Batch`) VALUES ('$UserName','$Email', '$Password','$Discipline', '$Batch')";
	$result = mysqli_query($conn,$sql);
	$code = "Success";
	$message = "Thank you for registering with us. Now....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>