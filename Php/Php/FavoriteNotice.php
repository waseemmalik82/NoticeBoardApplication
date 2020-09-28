<?php
require "connection.php";

$table =$_POST["Dicipline"];
$Batch =$_POST["Batch"];
$Seen =$_POST["Fav"];
$UserId=$_POST["UserId"];
$dis=$table;


$sql="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.NoticeId,$table.Date,
$Seen.UserId,$Seen.NoticeId FROM $table,$Seen
where $Seen.NoticeId like $table.NoticeId and $Seen.UserId like '$UserId' order by $table.Date DESC";

$result = mysqli_query($conn,$sql);
$response=array();
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$NoticeId=$row["NoticeId"];
	$Title = $row["Title"];
	$Description=$row["Description"];
	$Date=$row["Date"];
	$Batch ="";
	$FirstName="";
	$File=$row["FileName"];
	$ShowFile=$row["ShowFile"];
	$Type="my batch";
	array_push($response,array("Title"=>$Title,"Description"=>$Description,"NoticeId"=>$NoticeId,"Batch"=>$Batch,"ShowFile"=>$ShowFile,"FirstName"=>$FirstName,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}

}
$Seen="disciplinefav";
$table="discipline";
$sqll="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.NoticeId,$table.Date from $table where NoticeId IN(SELECT NoticeId from disciplinefav where UserId like '$UserId' order by $table.Date DESC)";
$resultt = mysqli_query($conn,$sqll);
if(mysqli_num_rows($resultt)>0)
{
	while($row = mysqli_fetch_array($resultt,MYSQLI_ASSOC))
	{
	$NoticeId=$row["NoticeId"];
	$Title = $row["Title"];
	$Description=$row["Description"];
	$Batch ="";
	$FirstName=$dis;
	$Date=$row["Date"];
	$Type="discipline";
	$File=$row["FileName"];
	$ShowFile=$row["ShowFile"];
	array_push($response,array("Title"=>$Title,"Description"=>$Description,"NoticeId"=>$NoticeId,"Batch"=>$Batch,"FirstName"=>$FirstName,"ShowFile"=>$ShowFile,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}

}
$Seen="varsityfav";
$table="varsitynotice";
$sqlll="SELECT $table.Title,$table.Description,$table.FileName,$table.ShowFile,$table.NoticeId,$table.Date from $table where $table.NoticeId IN(SELECT NoticeId from varsityfav where UserId like '$UserId' order by $table.Date DESC)";
$resulttt = mysqli_query($conn,$sqlll);
if(mysqli_num_rows($resulttt)>0)
{
	while($row = mysqli_fetch_array($resulttt,MYSQLI_ASSOC))
	{
	$NoticeId=$row["NoticeId"];
	$Title = $row["Title"];
	$Description=$row["Description"];
	$Batch ="";
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