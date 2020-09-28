<?php
require "connection.php";

$UserId=$_POST["UserId"];
$table=$_POST["Discipline"];

$sql="SELECT $table.Title,$table.Description,$table.Date,$table.FileName,$table.ShowFile,$table.NoticeType,$table.NoticeId 
FROM $table where $table.UserId like '$UserId' order by $table.Date DESC";

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
	$Type=$row["NoticeType"];
	$File=$row["FileName"];
	$SFile=$row["ShowFile"];
	array_push($response,array("Title"=>$Title,"Description"=>$Description,"NoticeId"=>$NoticeId,"ShowFile"=>$SFile,"Date"=>$Date,"File"=>$File,"NoticeType"=>$Type));
	}
        echo json_encode($response);
}
mysqli_close($conn);

?>