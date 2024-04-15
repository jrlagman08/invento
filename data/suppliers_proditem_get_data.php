<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

    $itemID = $_POST['itemID'];
	
	$sql="SELECT sup.supplierID,
				si.*
				FROM tbl_supplier sup 
				INNER JOIN tbl_supplieritem si ON sup.supplierID=si.supplierID
				WHERE si.supplierID='{$itemID}'
				ORDER BY si.prodName ASC";
	
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>