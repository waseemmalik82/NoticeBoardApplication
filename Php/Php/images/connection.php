<?php
    $dbhost="localhost";
	$username="root";
	$password="your db password";
	$db="your db name";
	$conn=mysqli_connect($dbhost,$username,$password,$db);
	if(!$conn)
	{
	mysqli_connect_error();
	}
	?>