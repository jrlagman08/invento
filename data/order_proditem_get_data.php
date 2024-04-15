<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

    $itemID = $_POST['itemID'];
	
	$sql="SELECT prod.prodName,
				ord.*
				FROM tbl_product prod 
				INNER JOIN tbl_orderitem ord ON prod.prodID=ord.prodID
				WHERE ord.orderID='{$itemID}'
				ORDER BY prod.prodName ASC";
	
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>