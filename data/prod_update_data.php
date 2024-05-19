<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$updateprodCode = $_POST['updateprodCode'];
	$updateprodName = $_POST['updateprodName'];
	$updateshortDesc = $_POST['updateshortDesc'];
	$updatefullDesc = $_POST['updatefullDesc'];
	$updateClassification = $_POST['updateClassification'];
	$updateCategory = $_POST['updateCategory'];
	$updatesubCategory = $_POST['updatesubCategory'];
	$updateWarehouse = $_POST['updateWarehouse'];
	$updateRack = $_POST['updateRack'];
	$updateSeason = $_POST['updateSeason'];
	$updateColor = $_POST['updateColor'];
	$updateUOM = $_POST['updateUOM'];
	$updatehighQty = $_POST['updatehighQty'];
	$updatelowQty = $_POST['updatelowQty'];
	$updaterunningBal = $_POST['updaterunningBal'];
	$updateorigPrice = $_POST['updateorigPrice'];
	$updatesalePrice = $_POST['updatesalePrice'];
	$updatediscountedPrice = $_POST['updatediscountedPrice'];
	$updateID = $_POST['updateID'];
	
	$sql = "SELECT count(prodID) as c FROM tbl_product WHERE LOWER(prodCode)=LOWER('{$updateprodCode}') AND prodID <> {$updateID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to update! Product Code already existing.";
	   
	} else {
		
		$sql="UPDATE tbl_product SET 
			categoryID ='{$updateCategory}',
			subCategoryID ='{$updatesubCategory}',
			prodCode ='{$updateprodCode}',
			prodName ='{$updateprodName}',
			shortDesc ='{$updateshortDesc}',
			fullDesc ='{$updatefullDesc}',
			classificationID ='{$updateClassification}',
			colorID ='{$updateColor}',
			rackID ='{$updateRack}',
			seasonID ='{$updateSeason}',
			uomID ='{$updateUOM}',
			warehouseID ='{$updateWarehouse}',
			origPrice ='{$updateorigPrice}',
			salePrice ='{$updatesalePrice}',
			discountedPrice ='{$updatediscountedPrice}',
			lowQty ='{$updatelowQty}',
			highQty ='{$updatehighQty}',
			runningBal ='{$updaterunningBal}' 
			WHERE prodID ='{$updateID}'";
		
		if(mysqli_query($connection, $sql)){
			
			if(isset($_POST['updateOrigP']) && intval($_POST['updateOrigP']) <> intval($updateorigPrice)) {
				$sqlOrigP = "UPDATE tbl_product SET lastUpdateOrigPrice = CURRENT_TIMESTAMP WHERE prodID ={$updateID}";
				$result = mysqli_query($connection, $sqlOrigP);
			}
			
			if(isset($_POST['updateSaleP']) && intval($_POST['updateSaleP']) <> intval($updatesalePrice)) {
				$sqlSaleP = "UPDATE tbl_product SET lastUpdateSalePrice = CURRENT_TIMESTAMP WHERE prodID ={$updateID}";
				$result = mysqli_query($connection, $sqlSaleP);
			}
			
			if(isset($_POST['updateDiscountP']) && intval($_POST['updateDiscountP']) <> intval($updatediscountedPrice)) {
				$sqlDiscountP = "UPDATE tbl_product SET lastUpdateDiscountedPrice = CURRENT_TIMESTAMP WHERE prodID ={$updateID}";
				$result = mysqli_query($connection, $sqlDiscountP);
			}
				
			echo "Success";
		}
		else {
			echo "Unable to update Product! Please try it again.";
		}
	}

	mysqli_close($connection);

?>