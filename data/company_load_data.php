<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');
	
	$sql="SELECT * FROM tbl_companyinfo WHERE companyinfoID = 1";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$data = array();
	while($row=mysqli_fetch_array($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	
	mysqli_close($connection);

?>