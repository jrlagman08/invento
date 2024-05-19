<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$tblName = $_POST['tblName'];
	$fieldName = $_POST['fieldName'];
	$notifName = $_POST['notifName'];
	$itemID = $_POST['itemID'];
	
	if(isset($_POST['curMod'])) {
		switch ($_POST['curMod']) {
		  case "orderlist":
			$sql = "DELETE FROM tbl_orderitem WHERE orderID = '{$itemID}' LIMIT 1";
			mysqli_query($connection, $sql);
			break;
		  case "suppliers":
			$sql = "DELETE FROM tbl_supplieritem WHERE supplierID = '{$itemID}' LIMIT 1";
			mysqli_query($connection, $sql);
			break;
		  case "repackage":
			$sql = "DELETE FROM tbl_repackageitem WHERE repackage_prodID = '{$itemID}' LIMIT 1";
			mysqli_query($connection, $sql);
			break;
		  case "category":
			$sql = "DELETE FROM tbl_subcategory WHERE categoryID = '{$itemID}' LIMIT 1";
			mysqli_query($connection, $sql);
			break;
		}
	}
	
	$sql = "DELETE FROM {$tblName} WHERE {$fieldName} = '{$itemID}' LIMIT 1";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);

	if($result){
		echo "Success";
	} 
	else {
		echo "Unable to delete ".$notifName."! Please try it again.";
	}

	mysqli_close($connection);

?>