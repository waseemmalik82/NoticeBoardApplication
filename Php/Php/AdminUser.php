<?php

require "connection.php";

$AdminId =$_POST["AdminId"];

$sql="SELECT user.UserId,user.UserName,user.Discipline,admin.UserId FROM user,admin where user.UserId like admin.UserId ";
$result = mysqli_query($conn,$sql);
$response = array();
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$UserId=$row["UserId"];
	$Name=$row["UserName"];
	$code = "Success";
	array_push($response,array("code"=>$code,"UserId"=>$UserId,"Name"=>$Name));
	}
	echo json_encode($response);

}
else
{
	$code = "Failed";
	$message = "User already exist.....";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($conn);
?>