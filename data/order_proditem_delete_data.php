<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$ordID = $_POST['ordID'];
	$prodID = $_POST['prodID'];
	$qty = $_POST['qty'];
	$ordItemID = $_POST['ordItemID'];

	//Update Single Product running balance
	$sql = "UPDATE tbl_product SET runningBal = runningBal + {$qty} WHERE prodID = '{$prodID}'";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	
	// must calculate the amount to adjust on tbl_order
	
	/*$sql = "SELECT count(prodQty) as qty FROM tbl_repackageitem WHERE repackage_prodID = {$rpProdID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['qty'] == 1){
		$sql = "UPDATE tbl_product SET runningBal = runningBal - {$qty} WHERE prodID={$rpProdID}";
		$result = mysqli_query($connection, $sql);
		confirm_query($result);
	}*/
	
	//Delete Product Item
	$sql = "DELETE FROM tbl_orderitem WHERE orderitemID = '{$ordItemID}' LIMIT 1";
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