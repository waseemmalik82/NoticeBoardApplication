<?php
require "connection.php";

$table =$_POST["Dicipline"];
$Batch =$_POST["Batch"];
$Seen =$_POST["Seen"];
$UserId=$_POST["UserId"];
$dis=$table;

$sql="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.Approval,$table.NoticeType,$table.UserId,$table.NoticeId,$table.Date,
user.Batch,user.UserName,user.UserId,user.Discipline FROM $table,user
where $table.UserId like user.UserId and (user.Batch like '$Batch' or (user.Batch IN(SELECT Batch from subscription where UserId like '$UserId') 
and $table.NoticeType like 'For all'))and $table.NoticeId NOT IN(SELECT NoticeId from $Seen where UserId like '$UserId')
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
}
$table="discipline";
$sqll="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.NoticeId,$table.Date from $table where NoticeId NOT IN(SELECT NoticeId from disciplineseen where UserId like '$UserId' order by $table.Date DESC)";
$resultt = mysqli_query($conn,$sqll);
if(mysqli_num_rows($resultt)>0)
{
	while($row = mysqli_fetch_array($resultt,MYSQLI_ASSOC))
	{
	$NoticeId=$row["NoticeId"];
	$Title = $row["Title"];
	$Description=$row["Description"];
	$Batch ="discipline";
	$FirstName=$dis;
	$Date=$row["Date"];
	$Type="discipline";
	$File=$row["FileName"];
	$ShowFile=$row["ShowFile"];
	array_push($response,array("Title"=>$Title,"Description"=>$Description,"Batch"=>$Batch,"FirstName"=>$FirstName,"NoticeId"=>$NoticeId,"ShowFile"=>$ShowFile,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}
}
$table="varsitynotice";
$sqlll="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.NoticeId,$table.Date from $table where $table.NoticeId NOT IN(SELECT NoticeId from seenvarsity where UserId like '$UserId' order by $table.Date DESC)";
$resulttt = mysqli_query($conn,$sqlll);
if(mysqli_num_rows($resulttt)>0)
{
	while($row = mysqli_fetch_array($resulttt,MYSQLI_ASSOC))
	{
	$NoticeId=$row["NoticeId"];
	$Title = $row["Title"];
	$Description=$row["Description"];
	$Batch ="varsity";
	$FirstName=$db;
	$Date=$row["Date"];
	$Type="varsity";
	$File=$row["FileName"];
	$ShowFile=$row["ShowFile"];
	array_push($response,array("Title"=>$Title,"Description"=>$Description,"Batch"=>$Batch,"FirstName"=>$FirstName,"NoticeId"=>$NoticeId,"ShowFile"=>$ShowFile,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}
}
echo json_encode($response);
mysqli_close($conn);

?>