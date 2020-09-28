<?php
require "connection.php";

$table =$_POST["Dicipline"];
$Batch =$_POST["Batch"];
$Seen =$_POST["Seen"];
$UserId=$_POST["UserId"];

$sql="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.Approval,$table.NoticeType,$table.UserId,$table.NoticeId,$table.Date,
user.Batch,user.UserName,user.UserId,user.Discipline,$Seen.UserId,$Seen.NoticeId FROM $table,user,$Seen
where $table.UserId like user.UserId and (user.Batch like '$Batch' or (user.Batch IN(SELECT Batch from subscription where UserId like '$UserId') 
and $table.NoticeType like 'For all'))and $Seen.NoticeId like $table.NoticeId and $Seen.UserId like '$UserId'
 and $table.Approval like '1' order by $table.Date DESC";

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
	$ShowFile=$row["ShowFile"];
	array_push($response,array("Title"=>$Title,"Description"=>$Description,"Batch"=>$Batch,"FirstName"=>$FirstName,"NoticeId"=>$NoticeId,"ShowFile"=>$ShowFile,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}
        echo json_encode($response);
}
mysqli_close($conn);

?>