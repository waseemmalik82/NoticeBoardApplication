<?php

require "connection.php";

$Discipline=$_POST["Discipline"];
$Password=$_POST["Password"];

$sql="SELECT disciplineName,password FROM disciplineadmin where disciplineName like '$Discipline' and password like '$Password' ";

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
	$sql="INSERT INTO `disciplineadmin` (`id`, `disciplineName`, `password`) VALUES (NULL, '$Discipline', '$Password')";
	
	$result = mysqli_query($conn,$sql);
	$code = "Success";
	$message = "Thank you for registering with us. Now....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>