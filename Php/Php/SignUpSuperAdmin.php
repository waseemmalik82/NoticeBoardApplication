<?php

require "connection.php";

$Varsity=$_POST["univarsity"];
$Password=$_POST["Password"];

$sql="SELECT VarsityName,password FROM superadmin where VarsityName like '$Varsity' and password like '$Password' ";

$result = mysqli_query($conn,$sql);
$response = array();
if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_row($result);
	$UserId=$row[0];
	$Email = $row[1];
	$Discipline=$row[3];
	$Batch=$row[4];
	$Name=$row[5];
	$code = "Success";
	array_push($response,array("code"=>$code,"UserId"=>$UserId,"Email"=>$Email,"Discipline"=>$Discipline,"Batch"=>$Batch,"Name"=>$Name));
        echo json_encode($response);

}
else
{
	$sql="INSERT INTO `superadmin` (`adminId`, `VarsityName`, `password`) VALUES (NULL, '$Varsity', '$Password')";
	$result = mysqli_query($conn,$sql);
	$code = "Success";
	$message = "Thank you for registering with us. Now....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>