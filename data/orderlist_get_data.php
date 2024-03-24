<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

    $itemID = $_POST['itemID'];
	
	$sql="SELECT o.*,c.name as cname,p.name as pname,CONCAT(u.fname, ' ', u.lname) as cashier FROM tbl_order o INNER JOIN tbl_customer c ON o.customerID=c.customerID INNER JOIN tbl_payment p ON o.paymentID=p.paymentID INNER JOIN tbl_user u ON o.userID=u.userID WHERE o.orderID='{$itemID}' ORDER BY o.orderDate DESC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$data = array();
	while($row=mysqli_fetch_array($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	
	mysqli_close($connection);

?>