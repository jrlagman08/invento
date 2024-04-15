<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$supItemID = $_POST['supItemID'];

	//Delete Supplier Product Item
	$sql = "DELETE FROM tbl_supplieritem WHERE supplieritemID = '{$supItemID}' LIMIT 1";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);

	if($result){
		echo "Success";
	} 
	else {
		echo "Unable to delete Product Item! Please try it again.";
	}

	mysqli_close($connection);

?>