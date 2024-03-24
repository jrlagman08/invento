<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addprodCode = $_POST['addprodCode'];
	$addprodName = $_POST['addprodName'];
	$addshortDesc = $_POST['addshortDesc'];
	$addfullDesc = $_POST['addfullDesc'];
	$prodList = $_POST['prodList'];
	$insertedId = '';
	$prodListDecoded = json_decode($prodList, true);
	
	// Check weather existing before inserting anything
	$sql = "SELECT count(prodCode) as c FROM tbl_product WHERE LOWER(prodCode)=LOWER('{$addprodCode}')";
	$result = mysqli_query($connection, $sql);
	$data=mysqli_fetch_assoc($result);
	confirm_query($result); 

	
	if($data['c'] > 0) {
		echo "Unable to add! The ".$addprodCode." already existing.";
	} else {
		// insert product itself
		$sql = "INSERT INTO tbl_product (prodCode, prodName, shortDesc, fullDesc) VALUES ('$addprodCode', '$addprodName', '$addshortDesc', '$addfullDesc')";
		if(mysqli_query($connection, $sql)){
			
			if($insertedId == '') {
				$insertedId = mysqli_insert_id($connection);
			}
			
			// Save repackage items 
			$prodListMap = array();
			foreach ($prodListDecoded as $item) {
				
				$prodListMap[$item[0]] = $item[1];
				$prodCode = $item[0];
				$prodGroup = explode("|", $item[1])[0];
				$prodQty = explode("|", $item[1])[1];
				$runBal = explode("|", $item[1])[2];
				
				$sql = "INSERT INTO tbl_repackageitem (prodID, prodGroup, prodQty) VALUES ('$insertedId', '$prodGroup', '$prodQty')";
				$result = mysqli_query($connection, $sql);
				
				// update running balance
				$bal = 
				$sql = "UPDATE tbl_product set runningBal={$runBal} WHERE LOWER(prodCode)=LOWER('{$prodCode}')";
				$result = mysqli_query($connection, $sql);
				
			}
	
			echo "Success";
		} else {
			echo "Unable to add ".$addprodCode."! Please try it again.";
		}
	}


?>