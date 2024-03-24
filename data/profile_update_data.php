<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$updateFname = $_POST['updateFname'];
	$updateLname = $_POST['updateLname'];
	$updateID = $_POST['updateID'];
	
	$sql="UPDATE tbl_user SET fname='{$updateFname}',lname='{$updateLname}' WHERE userID='{$updateID}'";
	if(mysqli_query($connection, $sql)){
		echo "Success";
	}
	else {
		echo "Unable to update Profile! Please try it again.";
	}

	mysqli_close($connection);

?>