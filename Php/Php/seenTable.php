<?php
require"connection.php";

$name=$_POST["Discipline"];
$tablename=$_POST["Seen"];

$response=array();
// sql to create table
$sql = "CREATE TABLE $tablename (
Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
NoticeId INT(11) UNSIGNED NOT NULL, 
UserId INT(11) NOT NULL,
FOREIGN KEY (UserId) REFERENCES user(UserId),
FOREIGN KEY (NoticeId) REFERENCES $name(NoticeId)
)";

if (mysqli_query($conn, $sql)) {
    	$code = "Success";
	$message = "created...successfully...";
   	array_push($response,array("code"=>$code,"message"=>$message));
}
 else 
 {
    	$code = "Failed";
	$message = "error......";
   	array_push($response,array("code"=>$code,"message"=>$message));
}
 echo json_encode($response);
mysqli_close($conn);
?>