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
	
	$addprodList = $_POST['addprodList'];
	$insertedID = '';
	$prodListDecoded = json_decode($addprodList, true);
	
	$sql = "SELECT count(prodID) as c FROM tbl_product WHERE LOWER(prodCode)=LOWER('{$addprodCode}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! Product Code already existing.";
	   
	} else {
			// Insert Product
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
			highQty,
			isRepackage) VALUES ('{$addCategory}',
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
			'{$addhighQty}',1)";
		if(mysqli_query($connection, $sql)){
			
			// Get ID of newly inserted Product
			if($insertedID == '') {
				$insertedID = mysqli_insert_id($connection);
			}
			
			// Save Repackage items 
			$ctr = 1;
			foreach ($prodListDecoded as $item) {
				
				$prodID = $item[0];
				$prodGroup = explode("|", $item[1])[0];
				$prodQty = explode("|", $item[1])[1];
				$runBal = explode("|", $item[1])[2];
				$single_prod = explode("|", $item[1])[3];
				
				// Update Running balance of the Repackage Product
				if($ctr == 1) {
					$sql = "UPDATE tbl_product SET runningBal = runningBal + {$prodQty} WHERE prodID={$insertedID}";
					$result = mysqli_query($connection, $sql);
				}
				$ctr++;
				
				$sql = "INSERT INTO tbl_repackageitem (repackage_prodID, single_prodID, prodGroup, prodQty) VALUES ('$insertedID', '$single_prod', '$prodGroup', '$prodQty')";
				$result = mysqli_query($connection, $sql);
				
				// Update Running balance of the Single Product
				$sql = "UPDATE tbl_product SET runningBal={$runBal} WHERE prodID={$prodID}";
				$result = mysqli_query($connection, $sql);
				
			}
			
			echo "Success";
		}
		else {
			echo "Unable to add Product! Please try it again.";
		}
	}

	mysqli_close($connection);

?>