<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

    $itemID = $_POST['itemID'];
	
	$sql="SELECT prod.prodID,
				prod.prodCode,
				prod.prodName, 
				prod.runningBal,
				rp.*
				FROM tbl_product prod 
				INNER JOIN tbl_repackageitem rp ON prod.prodID=rp.single_prodID
				WHERE rp.repackage_prodID='{$itemID}'
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