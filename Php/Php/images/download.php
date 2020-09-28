<?php
    // Opens directory
    $myDirectory=opendir(".");
	$files=array();
    // Gets each entry
    while($entryName=readdir($myDirectory)) {
		array_push($files,array(basename($entryName)));
        $dirArray[]=$entryName;
     }
     // Closes directory
    closedir($myDirectory);
	 echo json_encode($files);	
?>