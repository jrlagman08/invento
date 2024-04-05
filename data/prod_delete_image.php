<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$tblName = $_POST['tblName'];
	$fieldName = $_POST['fieldName'];
	$notifName = $_POST['notifName'];
	$imgID = $_POST['itemID'];
	$imgPath = $_POST['itemPath'];

	$sql = "DELETE FROM {$tblName} WHERE {$fieldName} = '{$imgID}' LIMIT 1";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	unlink("../".$imgPath);

	if($result){
		echo "Success";
	} 
	else {
		echo "Unable to delete ".$notifName."! Please try it again.";
	}

	mysqli_close($connection);

?>