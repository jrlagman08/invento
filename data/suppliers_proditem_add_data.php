<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$supID = $_POST['supID'];
	$prodcode = $_POST['prodcode'];
	$prodname = $_POST['prodname'];
	$proddetails = $_POST['proddetails'];
	$prodorigprice = $_POST['prodorigprice'];

	// Insert Supplier Product Item
	$sql = "INSERT INTO tbl_supplieritem (supplierID, prodCode, prodName, prodDetails, origPrice) VALUES ('$supID', '$prodcode', '$prodname', '$proddetails', '$prodorigprice')";
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