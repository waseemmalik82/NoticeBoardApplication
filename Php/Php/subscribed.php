<?php
require "connection.php";

$UserId=$_POST["UserId"];
$response = array();
	$sql="Select Batch from subscription where UserId like '$UserId'";
	$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$Batch=$row["Batch"];
	array_push($response,array("code"=>"Success","Batch"=>$Batch));
	} 
	echo json_encode($response);
}
else
	{
	$code = "Failed";
	$message = "no subscribed";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
	}
mysqli_close($conn);
?>