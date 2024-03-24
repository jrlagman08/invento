<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$userID = $_POST['userID'];
	
	$sql="SELECT * FROM tbl_user WHERE userID='{$userID}'";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$data = array();
	while($row=mysqli_fetch_array($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	
	mysqli_close($connection);

?>