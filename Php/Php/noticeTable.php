<?php

require "connection.php";

$tablename=$_POST["Discipline"];

$response=array();
// sql to create table
$sql = "CREATE TABLE $tablename (
NoticeId INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Title VARCHAR(150) NOT NULL,
Description VARCHAR(250) NOT NULL,
FileName VARCHAR(50),
ShowFile VARCHAR(50),
NoticeType VARCHAR(50) NOT NULL,
Approval INT(2) DEFAULT 0,
UserId INT(11) NOT NULL,
Date TIMESTAMP on update CURRENT_TIMESTAMP() NOT NULL DEFAULT CURRENT_TIMESTAMP(),
FOREIGN KEY (UserId) REFERENCES user(UserId)
)";

if (mysqli_query($conn, $sql)) 
{
	$code = "Success";
	$message = "created...successfully...";
   	array_push($response,array("code"=>$code,"message"=>$message));

} else 
{
	$code = "Failed";
	$message = "error......";
   	array_push($response,array("code"=>$code,"message"=>$message));
}
 echo json_encode($response);

mysqli_close($conn);
?>