<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$tblName = $_POST['tblName'];
	$sortName = $_POST['sortName'];
	$selCat = $_POST['selCat'];
	
	$sql="SELECT * FROM {$tblName} WHERE categoryID = '{$selCat}' ORDER BY {$sortName} ASC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>