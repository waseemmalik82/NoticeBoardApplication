<?php
require "connection.php";
$Email =$_POST["Email"];
$Password =$_POST["Password"];
$UserId="-2";

$sql="SELECT UserId,Email,Password,Discipline,Batch,UserName FROM user where Email like '$Email' and Password like '$Password' ";

$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$UserId=$row["UserId"];
	$Discipline=$row["Discipline"];
	$Batch=$row["Batch"];
	$Name=$row["UserName"];
	$code = "Success";
	}

}
else
{
	$code = "Login_failed";
	$message = "User not found...Please try again...";
	array_push($response,array("code"=>$code,"message"=>$message));
}
$AdminId=$UserId;
$sql="Select UserId from admin where UserId like'$AdminId'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
		array_push($response,array("code"=>$code,"UserId"=>$UserId,"Discipline"=>$Discipline,"Batch"=>$Batch,"Name"=>$Name,"admin"=>"true"));
}
else
{
		array_push($response,array("code"=>$code,"UserId"=>$UserId,"Discipline"=>$Discipline,"Batch"=>$Batch,"Name"=>$Name,"admin"=>"false"));
}
 echo json_encode($response);
mysqli_close($conn);

?>