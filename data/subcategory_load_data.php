<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	
	$sql="SELECT s.subCategoryID,s.categoryID,s.name,c.name as cat FROM tbl_subcategory s INNER JOIN tbl_category c ON s.categoryID = c.categoryID ORDER BY s.name ASC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>