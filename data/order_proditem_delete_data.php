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
	
	// Get salePrice and discountAmount from tbl_orderitem
	$sql = "SELECT salePrice, discountAmount FROM tbl_orderitem WHERE orderitemID = '{$ordItemID}' LIMIT 1";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);     
	$data=mysqli_fetch_assoc($result);
	
	$deductAmount = ($data['salePrice'] * $qty) - ($data['discountAmount'] * $qty);
	
	// Update tbl_order Grand Total and Balance
	$sql = "UPDATE tbl_order SET grandTotal = grandTotal - {$deductAmount}, balance = grandTotal - amountPaid WHERE orderID = '{$ordID}'";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	
	
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