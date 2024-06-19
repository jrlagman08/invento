<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$prodItem = $_POST['prodItem'];
	
	/*$sql = "SELECT ordItem.*, prod.*, ord.*
			FROM tbl_orderitem as ordItem
			INNER JOIN tbl_product prod ON ordItem.prodID=prod.prodID
			INNER JOIN tbl_order ord ON ordItem.orderID=ord.orderID
			WHERE prod.prodID = '{$prodItem}' AND ord.orderDate BETWEEN '{$startDate}' AND '{$endDate}'
			ORDER BY ord.orderDate DESC";*/

	$sql = "SELECT ord.orderDate as dt, prod.prodName, ord.paymentref as payref, ordItem.qty as invout, '0' as invin
			FROM tbl_orderitem as ordItem
			INNER JOIN tbl_product prod ON ordItem.prodID=prod.prodID
			INNER JOIN tbl_order ord ON ordItem.orderID=ord.orderID
			WHERE prod.prodID = '{$prodItem}' AND ord.orderDate BETWEEN '{$startDate}' AND '{$endDate}'
			UNION
			SELECT rcv.receivedDate as dt, prod.prodName, '' as payref, '0' as invout, rcvItem.qty as invin
			FROM tbl_receiveditem as rcvItem
			INNER JOIN tbl_product prod ON rcvItem.prodID=prod.prodID
			INNER JOIN tbl_received rcv ON rcvItem.receivedID=rcv.receivedID
			WHERE prod.prodID = '{$prodItem}' AND rcv.receivedDate BETWEEN '{$startDate}' AND '{$endDate}'";
      
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>