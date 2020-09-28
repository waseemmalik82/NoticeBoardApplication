<?php

require "connection.php";

$id=$_POST["Discipline"];

$sql="SELECT disciplineName FROM disciplineadmin";

$result = mysqli_query($conn,$sql);
$response = array();
if(mysqli_num_rows($result)>0)
{

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$Discipline=$row["disciplineName"];
	array_push($response,array("code"=>"Success","DisciplineName"=>$Discipline));
	} 
	echo json_encode($response);

}
else
{
	$code = "Failed";
	$message = "User not found...Please try again...";
	array_push($response,array("code"=>$code));
}
mysqli_close($conn);
?>