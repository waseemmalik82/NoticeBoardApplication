<?php
require "connection.php";

$Dicipline =$_POST["Dicipline"];
$Batch =$_POST["Batch"];
$UserId=$_POST["UserId"];

$sql="SELECT $table.FileName,$table.ShowFile,$table.Approval,$table.NoticeType,$table.UserId,$table.Date,
user.Batch,user.UserName,user.UserId,user.Discipline FROM $table,user
where $table.UserId like user.UserId and (user.Batch like '$Batch' or (user.Batch IN(SELECT Batch from subscription where UserId like '$UserId') 
and $table.NoticeType like 'For all'))and $table.Approval like '1' order by $table.Date DESC";

$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$file=$row["FileName"];
	$showFile=$row=["ShowFile"];
	array_push($response,array("File"=>$file,"ShowFile"=>$showFile));
	}
        echo json_encode($response);
}
mysqli_close($conn);

?>