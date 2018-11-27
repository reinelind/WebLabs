<?php

function routes () {
	STATIC  $i = 0;
	if (empty ($_GET))
			return "";
	else {
		STATIC $root_path; 
		
		$path = $_GET['path'];
		if ($i == 0)
			$root_path = $path;
			

	switch ($_REQUEST['button']) {
		case "Home":
			$path = "C:/Users/User";
			$_GET['path'] = $path;
			break; 
		case "Root":
		
			$path = $root_path;
			$_GET['path'] = $path;
			break;
		case "Go to" :
			$path = $_GET['path'];
			break;
		}
	}
	$i+=1;
return ($path);
}
?>