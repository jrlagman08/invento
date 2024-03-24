<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$prodID = $_POST['prodID'];
	
	$sql="SELECT * FROM tbl_image WHERE prodID = {$prodID} ORDER BY imgID DESC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>