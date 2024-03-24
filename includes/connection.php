<?php
	//Database Connection Settings
	require_once("constant.php");
	
	//Set Database Connection
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if(!$connection){
		die("Database connection failed!" . mysqli_connect_error());
	}
	
	//Select Database
	/*$db = mysql_select_db(DB_NAME, $connection);
	if(!$db){
		die("Database selection failed" . mysql_error());
	}*/
	
	date_default_timezone_set('Asia/Manila');
	
	$getdatenow = date("Y-m-d");
	$gettimenow = date("H:i:s");
	$getdatetimenow = date("Y-m-d H:i:s");
?>