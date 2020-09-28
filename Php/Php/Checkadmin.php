<?php
require "connection.php";

$AdminId=$_POST["UserId"];

$sql="Select admin_id from admin where admin_id like'$AdminId'";

$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$code = "Success";
	array_push($response,array("code"=>$code));
        echo json_encode($response);
}
else
{
	$code = "Failed";
	array_push($response,array("code"=>$code));
	echo json_encode($response);
}
mysqli_close($conn);

?>