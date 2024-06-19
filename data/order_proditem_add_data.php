<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$orderID = $_POST['orderID'];
	$prodID = $_POST['prodID'];
	$origPrice = $_POST['origPrice'];
	$salePrice = $_POST['salePrice'];
	$discountedPrice = $_POST['discountedPrice'];
	$discountAmount = $_POST['discountAmount'];
	$qty = $_POST['qty'];
	$totalprice = $_POST['totalprice'];

	// Insert Product item in tbl_orderitem
	$sql = "INSERT INTO tbl_orderitem (orderID, prodID, origPrice, salePrice, discountedPrice, discountAmount, qty) VALUES ('$orderID', '$prodID', '$origPrice', '$salePrice', '$discountedPrice', '$discountAmount', '$qty')";
	$result = mysqli_query($connection, $sql);
				
	// Update tbl_order grandtotal and balance 
	$sql = "UPDATE tbl_order SET grandTotal = grandTotal + {$totalprice}, balance = grandTotal - amountPaid WHERE orderID={$orderID}";
	$result = mysqli_query($connection, $sql);
	
	// Update Running balance of the Single Product
	$sql = "UPDATE tbl_product SET runningBal = runningBal - {$qty} WHERE prodID={$prodID}";
	$result = mysqli_query($connection, $sql);
				
	if($result){
		echo "Success";
	} 
	else {
		echo "Unable to add Product Item! Please try it again.";
	}

	mysqli_close($connection);

?>