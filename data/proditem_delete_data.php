<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$rpID = $_POST['rpID'];
	$prodID = $_POST['prodID'];
	$qty = $_POST['qty'];
	$rpProdID = $_POST['rpProdID'];

	//Update Single Product running balance
	$sql = "UPDATE tbl_product prod, (SELECT  prodGroup * prodQty AS newBal FROM tbl_repackageitem WHERE repackageitemID = '{$rpID}' LIMIT 1) addBal SET prod.runningBal = prod.runningBal + addBal.newBal WHERE prod.prodID = '{$prodID}'";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	
	$sql = "SELECT count(prodQty) as qty FROM tbl_repackageitem WHERE repackage_prodID = {$rpProdID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['qty'] == 1){
		$sql = "UPDATE tbl_product SET runningBal = runningBal - {$qty} WHERE prodID={$rpProdID}";
		$result = mysqli_query($connection, $sql);
		confirm_query($result);
	}
	
	//Delete Product Item
	$sql = "DELETE FROM tbl_repackageitem WHERE repackageitemID = '{$rpID}' LIMIT 1";
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