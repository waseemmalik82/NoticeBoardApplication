<?php
    $dbhost="localhost";
	$username="root";
	$password="";
	$db="board";
	$conn=mysqli_connect($dbhost,$username,$password,$db);
	if(!$conn)
	{
	mysqli_connect_error();
	}
	?>