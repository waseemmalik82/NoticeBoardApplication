<?php
require "connection.php";

$table =$_POST["Discipline"];
$Batch =$_POST["Batch"];
$UserId=$_POST["UserId"];

$sql="SELECT $table.NoticeId,$table.Title,$table.FileName,$table.ShowFile,$table.Description,$table.Approval,$table.Date,$table.NoticeType,$table.UserId,
user.Batch,user.UserName,user.UserId,user.Discipline FROM $table,user
where $table.UserId like user.UserId and user.Batch like '$Batch' and user.Discipline like '$table' and $table.Approval like '0' order by $table.Date DESC";

$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$NoticeId=$row["NoticeId"];
	$Title = $row["Title"];
	$Description=$row["Description"];
	$Batch = $row["Batch"];
	$FirstName=$row["UserName"];
	$Date=$row["Date"];
	$Type=$row["NoticeType"];
	$File=$row["FileName"];
	$Showf=$row["ShowFile"];
	array_push($response,array("Title"=>$Title,"ShowFile"=>$Showf,"Description"=>$Description,"Batch"=>$Batch,"FirstName"=>$FirstName,"NoticeId"=>$NoticeId,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}
        echo json_encode($response);
}
mysqli_close($conn);

?>