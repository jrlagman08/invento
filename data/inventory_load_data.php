<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$prodItem = $_POST['prodItem'];
	
	$sql = "SELECT ordItem.*, prod.*, ord.*
			FROM tbl_orderitem as ordItem
			INNER JOIN tbl_product prod ON ordItem.prodID=prod.prodID
			INNER JOIN tbl_order ord ON ordItem.orderID=ord.orderID
			WHERE prod.prodID = '{$prodItem}' AND ord.orderDate BETWEEN '{$startDate}' AND '{$endDate}'
			ORDER BY ord.orderDate DESC";

	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>