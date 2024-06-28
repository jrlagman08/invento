<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	
	$sql="SELECT ic.*,CONCAT(u.fname, ' ', u.lname) as uname FROM tbl_count ic INNER JOIN tbl_user u ON ic.userID=u.userID ORDER BY ic.countDate DESC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>