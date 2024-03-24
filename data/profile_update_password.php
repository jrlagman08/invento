<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$pword = $_POST['pword'];
	$pass = md5($pword);
	$userID = $_POST['userID'];
	
	$sql="UPDATE tbl_user SET pword='{$pass}' WHERE userID='{$userID}'";
	if(mysqli_query($connection, $sql)){
		echo "Success";
	}
	else {
		echo "Unable to change Password! Please try it again.";
	}

	mysqli_close($connection);

?>