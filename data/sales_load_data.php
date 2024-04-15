<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	
	$sql = "SELECT ord.*, cus.name,
			IFNULL((SELECT (ordItem.salePrice - ordItem.origPrice) * ordItem.qty FROM tbl_orderitem as ordItem WHERE ord.orderID=ordItem.orderID LIMIT 1),0) as profit
			FROM tbl_order as ord
			INNER JOIN tbl_customer cus ON ord.customerID=cus.customerID
			WHERE ord.orderDate BETWEEN '{$startDate}' AND '{$endDate}'
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