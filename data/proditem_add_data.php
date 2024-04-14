<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$repackageprodID = $_POST['repackageprodID'];
	$singleprodID = $_POST['singleprodID'];
	$prodGroup = $_POST['prodGroup'];
	$prodQty = $_POST['prodQty'];
	$runBal = $_POST['runBal'];

	// Update Running balance of the Repackage Product
	$sql = "UPDATE tbl_product SET runningBal = {$prodQty} WHERE prodID={$repackageprodID}";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	
	$sql = "INSERT INTO tbl_repackageitem (repackage_prodID, single_prodID, prodGroup, prodQty) VALUES ('$repackageprodID', '$singleprodID', '$prodGroup', '$prodQty')";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	
	// Update Running balance of the Single Product
	$sql = "UPDATE tbl_product SET runningBal={$runBal} WHERE prodID={$singleprodID}";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
				
	if($result){
		echo "Success";
	} 
	else {
		echo "Unable to add Product Item! Please try it again.";
	}

	mysqli_close($connection);

?>