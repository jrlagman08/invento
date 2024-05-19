<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addOrigPrice = $_POST['addOrigPrice'];
	$addSalePrice = $_POST['addSalePrice'];
	$addDiscountedPrice = $_POST['addDiscountedPrice'];
	$Oprice = $_POST['Oprice'];
	$Sprice = $_POST['Sprice'];
	$Dprice = $_POST['Dprice'];
	$prodCode = $_POST['prodCode'];
		
	if(intval($Oprice) <> intval($addOrigPrice)) {
		$sqlOrigP = "UPDATE tbl_product SET origPrice ='{$addOrigPrice}', lastUpdateOrigPrice = CURRENT_TIMESTAMP WHERE prodCode ='{$prodCode}'";
		mysqli_query($connection, $sqlOrigP);
	}
	
	if(intval($Sprice) <> intval($addSalePrice)) {
		$sqlSaleP = "UPDATE tbl_product SET salePrice ='{$addSalePrice}', lastUpdateSalePrice = CURRENT_TIMESTAMP WHERE prodCode ='{$prodCode}'";
		mysqli_query($connection, $sqlSaleP);
	}
	
	if(intval($Dprice) <> intval($addDiscountedPrice)) {
		$sqlDiscountP = "UPDATE tbl_product SET discountedPrice ='{$addDiscountedPrice}', lastUpdateDiscountedPrice = CURRENT_TIMESTAMP WHERE prodCode ='{$prodCode}'";
		mysqli_query($connection, $sqlDiscountP);
	}
		
	echo "Success";
	
	mysqli_close($connection);

?>