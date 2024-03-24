<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addprodCode = $_POST['addprodCode'];
	$addprodName = $_POST['addprodName'];
	$addshortDesc = $_POST['addshortDesc'];
	$addfullDesc = $_POST['addfullDesc'];
	$addClassification = $_POST['addClassification'];
	$addCategory = $_POST['addCategory'];
	$addsubCategory = $_POST['addsubCategory'];
	$addWarehouse = $_POST['addWarehouse'];
	$addRack = $_POST['addRack'];
	$addSeason = $_POST['addSeason'];
	$addColor = $_POST['addColor'];
	$addUOM = $_POST['addUOM'];
	$addhighQty = $_POST['addhighQty'];
	$addlowQty = $_POST['addlowQty'];
	$addorigPrice = $_POST['addorigPrice'];
	$addsalePrice = $_POST['addsalePrice'];
	$adddiscountedPrice = $_POST['adddiscountedPrice'];
	
	$sql = "SELECT count(prodID) as c FROM tbl_product WHERE LOWER(prodCode)=LOWER('{$addprodCode}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! Product Code already existing.";
	   
	} else {
		
		$sql = "INSERT INTO tbl_product (categoryID,
		subCategoryID,
		prodCode,
		prodName,
		shortDesc,
		fullDesc,
		classificationID,
		colorID,
		rackID,
		seasonID,
		uomID,
		warehouseID,
		origPrice,
		salePrice,
		discountedPrice,
		lowQty,
		highQty) VALUES ('{$addCategory}',
		'{$addsubCategory}',
		'{$addprodCode}',
		'{$addprodName}',
		'{$addshortDesc}',
		'{$addfullDesc}',
		'{$addClassification}',
		'{$addColor}',
		'{$addRack}',
		'{$addSeason}',
		'{$addUOM}',
		'{$addWarehouse}',
		'{$addorigPrice}',
		'{$addsalePrice}',
		'{$adddiscountedPrice}',
		'{$addlowQty}',
		'{$addhighQty}')";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to add Product! Please try it again.";
		}
	}

	mysqli_close($connection);

?>